<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Library\OAuthConsumer;
use App\Library\OAuthRequest;
use App\Models\Ad;
use Illuminate\Http\Request;
use App\Library\OAuthUtil;
use App\Library\OAuthSignatureMethod_HMAC_SHA1;
use Bryceandy\Laravel_Pesapal\Facades\Pesapal;
use Bryceandy\Laravel_Pesapal\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

include(app_path() . '/Library/OAuth.php');

//require_once __DIR__ . '/app/Library/OAuth.php';

class PaymentController extends Controller
{
    public function PesaInit1($ad_id)
    {


        $token = $params = NULL;
        $consumer_key = 'quftf6zk9oMUxq3IOuiCpnYcj6HNo1+x';//Register a merchant account on
        //demo.pesapal.com and use the merchant key for testing.
        //When you are ready to go live make sure you change the key to the live account
        //registered on www.pesapal.com!
        $consumer_secret = 'IPn6kp21Nqgx04o7VhNCa4fiqRo=';// Use the secret from your test
        //account on demo.pesapal.com. When you are ready to go live make sure you
        //change the secret to the live account registered on www.pesapal.com!
        $signature_method = new OAuthSignatureMethod_HMAC_SHA1();
        $iframelink = 'https://demo.pesapal.com/api/PostPesapalDirectOrderV4';//change to
        //https://www.pesapal.com/API/PostPesapalDirectOrderV4 when you are ready to go live!


        //get form details
        $ad = Ad::findOrFail($ad_id);
        $amount = 40;
        $amount = number_format($amount, 2);//format amount to 2 decimal places
//        dd($ad->id);
        $desc = 'Ad payment';
        $type = 'MERCHANT'; //default value = MERCHANT
        $reference = 'de985855-8482-41bb-ae9b-e75684685570';//unique order id of the transaction, generated by merchant
        $first_name = 'Eric';
        $last_name = 'Njeru';
        $email = 'ericmukundi10@gmail.com';
        $phonenumber = '0792946114';//ONE of email or phonenumber is required

        $callback_url = 'http://127.0.0.1:8000/PesaExecute'; //redirect url, the page that will handle the response from pesapal.

        $post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"https://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"https://www.w3.org/2001/XMLSchema\" Amount=\"" . $amount . "\" Description=\"" . $desc . "\" Type=\"" . $type . "\" Reference=\"" . $reference . "\" FirstName=\"" . $first_name . "\" LastName=\"" . $last_name . "\" Email=\"" . $email . "\" PhoneNumber=\"" . $phonenumber . "\" xmlns=\"https://www.pesapal.com\" />";
        $post_xml = htmlentities($post_xml);

        $consumer = new OAuthConsumer($consumer_key, $consumer_secret);

        //post transaction to pesapal
        $iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);
        $iframe_src->set_parameter("oauth_callback", $callback_url);
        $iframe_src->set_parameter("pesapal_request_data", $post_xml);
        $iframe_src->sign_request($signature_method, $consumer, $token);

        //display pesapal - iframe and pass iframe_src

        return view('pages.pesapaliframe', compact('iframe_src'));
    }

    public function PesaInit($ad_id)
    {

        $user = Auth::user();
        $data = [
            'amount' => 1500,
            'currency' => 'KES',
            'description' => 'Ad payment',
            'type' => 'MERCHANT',
            'reference' => $ad_id,
            'first_name' => $user->fname,
            'last_name' => $user->lname,
            'email' => $user->email,
            'phone_number' => $user->phone,
        ];
        $query = http_build_query($data, null, '&', PHP_QUERY_RFC3986);
//       dd( config('pesapal.consumer_key',1));

        return Redirect::to('pesapal/iframe?' . $query);
    }

    public function PesaExecute(Request $request)
    {
        $pesapal_merchant_reference = $request->pesapal_merchant_reference;
        $pesapal_transaction_tracking_id = $request->pesapal_transaction_tracking_id;
        //store $pesapal_tracking_id in your database against the order with orderid = $reference
        DB::table('transactions')->insert(
            array(
                'reference_id' => $pesapal_transaction_tracking_id
            )
        );

        return redirect()->route('pendingPending')->withSuccess('Your payment is being processed. We will notify once it has completed.');

    }

    public function PesapalIPNListener(Request $request)
    {
        $transaction = Pesapal::getTransactionDetails(
            request('pesapal_merchant_reference'), request('pesapal_transaction_tracking_id')
        );

        // Store the paymentMethod, trackingId and status in the database
        Payment::modify($transaction);

        // If there was a status change and the status is not 'PENDING'
        if (request('pesapal_notification_type') == "CHANGE" && request('pesapal_transaction_tracking_id') != '') {

            //Here you can do multiple things to notify your user that the changed status of their payment
            // 1. Send an email or SMS (if your user doesnt have an email)to your user
            $payment = Payment::whereReference(request('pesapal_merchant_reference'))->first();
            $details = [
                'subject' => 'Open Gate Payment Status',
                'company_name' => 'Open Gate Advertisement Space',
                'email' => $payment->email,
                'from' => 'noreply@mobharvesters.net',
                'content' => 'Payment transaction ID is '.request('pesapal_transaction_tracking_id'). 'Your payment status is '. $transaction['status']
            ];
            dispatch(new SendEmailJob($details));
//            Mail::to($payment->email)->send(new PaymentProcessed(request('pesapal_transaction_tracking_id'), $transaction['status']));
            // PaymentProcessed is an example of a mailable email, it does not come with the package

            // 2. You may also create a Laravel Event & Listener to process a Notification to the user
            // 3. You can also create a Laravel Notification or dispatch a Laravel Job. Possibilities are endless!

            $ad = Ad::find(request('pesapal_merchant_reference'));
            $ad->is_paid = 1;
            $ad->update();
            // Finally output a response to PesaPal
            $response = 'pesapal_notification_type=' . request('pesapal_notification_type') .
                '&pesapal_transaction_tracking_id=' . request('pesapal_transaction_tracking_id') .
                '&pesapal_merchant_reference=' . request('pesapal_merchant_reference');

            ob_start();
            echo $response;
            ob_flush();
            exit; // This is mandatory. If you dont exit, Pesapal will not get your response.
        }
    }

    public function PesapalIPNListener1(Request $request)
    {
        $consumer_key = 'quftf6zk9oMUxq3IOuiCpnYcj6HNo1+x';//Register a merchant account on
        //demo.pesapal.com and use the merchant key for testing.
        //When you are ready to go live make sure you change the key to the live account
        //registered on www.pesapal.com!
        $consumer_secret = 'IPn6kp21Nqgx04o7VhNCa4fiqRo=';// Use the secret from your test
        //account on demo.pesapal.com. When you are ready to go live make sure you
        //change the secret to the live account registered on www.pesapal.com!
        $statusrequestAPI = 'https://demo.pesapal.com/api/querypaymentstatus';//change to
        //https://www.pesapal.com/api/querypaymentstatus' when you are ready to go live!
//        $transaction = Pesapal::getTransactionDetails(
//            request('pesapal_merchant_reference'), request('pesapal_transaction_tracking_id')
//        );
        $transaction = [
            'pesapal_merchant_reference' => $request->pesapal_merchant_reference,
            'pesapalTrackingId' => $request->pesapal_transaction_tracking_id,
            'pesapalNotification' => $request->pesapal_notification_type
        ];
        $pesapal_merchant_reference = $request->pesapal_merchant_reference;
        $pesapalTrackingId = $request->pesapal_transaction_tracking_id;
        $pesapalNotification = $request->pesapal_notification_type;
//        dd($transaction);
        // Store the paymentMethod, trackingId and status in the database
//        Payment::modify($transaction);


        if ($pesapalNotification == "CHANGE" && $pesapalTrackingId != '') {
            $token = $params = NULL;
            $consumer = new OAuthConsumer($consumer_key, $consumer_secret);
            $signature_method = new OAuthSignatureMethod_HMAC_SHA1();

            //get transaction status
            $request_status = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $statusrequestAPI, $params);
            $request_status->set_parameter("pesapal_merchant_reference", $pesapal_merchant_reference);
            $request_status->set_parameter("pesapal_transaction_tracking_id", $pesapalTrackingId);
            $request_status->sign_request($signature_method, $consumer, $token);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $request_status);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            if (defined('CURL_PROXY_REQUIRED')) if (CURL_PROXY_REQUIRED == 'True') {
                $proxy_tunnel_flag = (defined('CURL_PROXY_TUNNEL_FLAG') && strtoupper(CURL_PROXY_TUNNEL_FLAG) == 'FALSE') ? false : true;
                curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, $proxy_tunnel_flag);
                curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
                curl_setopt($ch, CURLOPT_PROXY, CURL_PROXY_SERVER_DETAILS);
            }

            $response = curl_exec($ch);

            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $raw_header = substr($response, 0, $header_size - 4);
            $headerArray = explode("\r\n\r\n", $raw_header);
            $header = $headerArray[count($headerArray) - 1];

            dd($response);
            //transaction status
            $elements = preg_split("/=/", substr($response, $header_size));
            $status = $elements[1];

            curl_close($ch);


            //UPDATE YOUR DB TABLE WITH NEW STATUS FOR TRANSACTION WITH pesapal_transaction_tracking_id $pesapalTrackingId
            $payment = Payment::whereReference($pesapal_merchant_reference)->first();
            $payment->status = $status;
             $payment->payment_method = $elements[2];
             $payment->tracking_id = $elements[3];


            if ($payment->update()) {
                $ad = Ad::find(request('pesapal_merchant_reference'));
                $ad->is_paid = 1;
                $ad->update();

                $resp = "pesapal_notification_type=$pesapalNotification&pesapal_transaction_tracking_id=$pesapalTrackingId&pesapal_merchant_reference=$pesapal_merchant_reference";
                ob_start();
                echo $resp;
                ob_flush();
                exit;
            }

        }
    }
}
