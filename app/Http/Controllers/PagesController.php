<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdPhoto;
use App\Models\Category;
use App\Models\County;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{

    public function __construct()
    {
        return redirect('pages.maintenance');
    }

    public function index()
    {
        $user = Auth::user();
        $counties = County::all();
        $categories = Category::all();
        $featured_ads = Ad::where('is_featured', 1)->where('is_Active', 1)->orderBy('updated_at', 'DESC')->get();
        $ads = Ad::where('is_paid',1)->Where('is_active', 1)->orderBy('created_at', 'DESC')->paginate(6);
        return view('pages.index', compact('user', 'counties', 'categories', 'featured_ads', 'ads'));
    }

    public function maintenance()
    {
        return view('pages.maintenance');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $total_ads = Ad::where('user_id', $user->id)->count();
        $total_fav_ads = $user->getFavoriteItems(Ad::class)->where('is_active', 1)->count();
        $total_featured_ads = Ad::where('user_id', $user->id)->where('is_featured', 1)->count();
        $categories = Category::withCount('ads')->get();
        return view('pages.dashboard', compact('user', 'total_ads', 'total_fav_ads', 'total_featured_ads', 'categories'));
    }

    public function categories()
    {
        $categories = Category::withCount('ads')->get();
        return view('pages.categories', compact('categories'));
    }

    public function listings()
    {
        $user = Auth::user();
        $ads = Ad::where('is_paid',1)->where('is_active', 1)->orderby('created_At', 'DESC')->paginate(20);
        $categories = Category::withCount('ads')->get();
        $header = "all Ads";
        return view('pages.listings', compact('user', 'ads', 'categories', 'header'));
    }
    public function rejected()
    {
        $user = Auth::user();
        $header = "Rejected Adverts";
        return view('pages.rejected', compact('user', 'header'));
    }
    public function missed()
    {
        $user = Auth::user();
        $header = "Missed Adverts";
        return view('pages.missed', compact('user', 'header'));
    }

    public function categoryListings($category_id)
    {
        $user = Auth::user();
        $ads = Ad::where('is_paid',1)->where('is_active', 1)->where('category_id', $category_id)->orderby('created_At', 'DESC')->paginate(20);
        $categories = Category::withCount('ads')->get();
        $category = Category::find($category_id);
        $header = "all " . $category->name;
        return view('pages.listings', compact('user', 'ads', 'categories', 'header'));
    }

    public function locationListings($location)
    {
        $user = Auth::user();
        $ads = Ad::where('is_paid',1)->where('is_active', 1)->where('county', $location)->orderby('created_At', 'DESC')->paginate(20);
        $categories = Category::withCount('ads')->get();
        $header = $location . " Ads";
        return view('pages.listings', compact('user', 'ads', 'categories', 'header'));
    }

    public function sellerListings($seller_id)
    {
        $user = Auth::user();
        $ads = Ad::where('is_paid',1)->where('is_active', 1)->where('user_id', $seller_id)->orderby('created_At', 'DESC')->paginate(20);
        $categories = Category::withCount('ads')->get();
        $seller  =User::find($seller_id);
        $header = $seller->fname.' '.$seller->lname . " Ads";
        return view('pages.listings', compact('user', 'ads', 'categories', 'header'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function postAd()
    {
        $categories = Category::all();
        $counties = County::all();
        $user = Auth::user();
        return view('pages.post_ad', compact('categories', 'counties', 'user'));
    }

    public function adDetails($id)
    {
        $ad = Ad::where('is_paid',1)->where('id', $id)->where('is_active', 1)->first();
        $seller_ads = Ad::where('is_paid',1)->where('user_id', $ad->user_id)->where('is_active', 1)->take(5)->get();
        return view('pages.ad_details', compact('ad', 'seller_ads'));
    }

    public function favouriteAds()
    {
        $user = Auth::user();
        $ads = $user->getFavoriteItems(Ad::class)->where('is_active', 1)->get();
        return view('pages.acc_fav_ads', compact('ads', 'user'));
    }

    public function myAds()
    {
        $user = Auth::user();
        $ads = Ad::where('user_id', $user->id)->where('is_paid',1)->get();
        $featured_count = Ad::where('is_featured', 1)->count();
        return view('pages.acc_my_ads', compact('ads', 'user', 'featured_count'));
    }
    public function pendingPending()
    {
        $user = Auth::user();
        $ads = Ad::where('user_id', $user->id)->where('is_paid',0)->get();
        return view('pages.acc_pending_ads', compact('ads', 'user'));
    }

    public function profileSettings()
    {
        $user = Auth::user();
        return view('pages.acc_settings', compact('user'));
    }

    function updateProfile(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'f_name' => 'required',
            'l_name' => 'required',
            'phone' => 'required',
            'profile_picture' => 'mimes:jpeg,png,jpg|max:4048',
            'password' => 'same:confirm-password',
        ];
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response([
                'errors' => $error->errors()->all(),
            ], Response::HTTP_OK);
        }

        $user->fname = $request->f_name;
        $user->lname = $request->l_name;
        $user->phone = $request->phone;

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasfile('profile_picture')) {
            $imgdestination = 'ProfilePics/';
            $profile_pic = $request->file('profile_picture');
            $imgname = $this->generateUniqueFileNameProfile($profile_pic, $imgdestination);
            $user->profile_pic = $imgname;

        }

        if ($user->update()) {
            return response([
                'success' => 'Profile Updated successfully',
            ], Response::HTTP_OK);
        } else {

            return response([
                'warning' => 'Profile not updated',
            ], Response::HTTP_OK);
        }

    }



    public function ajaxLogin(Request $request)
    {
        $rules = [
            'email' => 'string|required',
            'password' => 'string|required',
        ];
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response([
                'errors' => $error->errors()->all(),
            ], Response::HTTP_OK);
        }


        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if (Auth::check()) {

            $user = Auth::user();
            return response([
                'success' => 'Success! you are logged in successfully',
            ], Response::HTTP_OK);
        } else {
            return response([
                'error' => 'Wrong email or password!',
            ], Response::HTTP_OK);
        }


    }

    public function generateUniqueFileNameProfile($image, $destinationPath)
    {
        $initial = "openGate_";
        $name = $initial . bin2hex(random_bytes(8)) . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->resize(100, 100, function ($constraint) {
//            $constraint->aspectRatio();
        })->save(public_path($destinationPath . $name));
        return $name;
    }


}
