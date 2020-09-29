<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdPhoto;
use App\Models\Category;
use App\Models\County;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $featured_ads = Ad::where('is_featured',1)->where('is_Active',1)->orderBy('updated_at','DESC')->get();
        $ads = Ad::Where('is_active',1)->orderBy('created_at','DESC')->paginate(6);
        return view('pages.index',compact('user','counties','categories','featured_ads','ads'));
    }

    public function maintenance()
    {
        return view('pages.maintenance');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $total_ads = Ad::where('user_id',$user->id)->count();
//        $total_fav_ads = $user->favorites()->count();
        $total_fav_ads = Ad::where('user_id',$user->id)->where('is_featured',1)->count();
        $total_featured_ads = Ad::where('user_id',$user->id)->where('is_featured',1)->count();
        return view('pages.dashboard',compact('user','total_ads','total_fav_ads','total_featured_ads'));
    }

    public function categories()
    {
        $header = false;
        return view('pages.categories')->with('no_header', $header);
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
        return view('pages.ad_details')->with('id', $id);
    }

    public function favouriteAds()
    {
        $user = Auth::user();
        $ads = $user->getFavoriteItems(Ad::class)->get();
        return view('pages.acc_fav_ads',compact('ads','user'));
    }

    public function myAds()
    {
        $user = Auth::user();
        $ads = Ad::where('user_id',$user->id)->get();
        $featured_count = Ad::where('is_featured',1)->count();
        return view('pages.acc_my_ads',compact('ads','user','featured_count'));
    }

    public function settings()
    {
        return view('pages.acc_settings');
    }

    function updateProfile(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'fname' => 'required',
            'lname' => 'required',
            'password' => 'same:confirm-password',
        ];
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response([
                'errors' => $error->errors()->all(),
            ], Response::HTTP_OK);
        }

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasfile('profile_pic')) {
            $imgdestination = '/ProfilePics';
            $profile_pic = $request->file('profile_pic');
            $imgname = $this->generateUniqueFileName($profile_pic, $imgdestination);
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


    function uploadPost(Request $request)
    {
        $rules = [
            'title' => 'required',
            'category' => 'required',
            'county' => 'required',
            'price' => 'required|integer',
            'desc' => 'required',
            'main_image' => 'required|mimes:jpeg,png,jpg|max:4048',
        ];
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response([
                'errors' => $error->errors()->all(),
            ], Response::HTTP_OK);
        }
        $user_id= Auth::user()->id;
        $ad = new Ad();
        $ad->user_id = $user_id;
        $ad->title = $request->title;
        $ad->category_id = $request->category;
        $ad->county = $request->county;
        $ad->price = $request->price;
        $ad->description = $request->desc;
        if ($ad->save()) {

            $ad_id = $ad->id;
            $imgdestination = '/openGateAds';
            $gallerarray = [];

            if ($request->hasfile('main_image')) {
                $adImage = $request->file('main_image');
                $imgname = $this->generateUniqueFileName($adImage, $imgdestination);

                $ad_image = new AdPhoto();
                $ad_image->ad_id = $ad_id;
                $ad_image->image_path = $imgname;
                $ad_image->type = "main_image";
                $ad_image->save();
            }

            if ($request->hasfile('gallery')) {

                foreach ($request->file('gallery') as $image) {
                    $galleryname = $this->generateUniqueFileName($image, $imgdestination);
                    $gallerarray[] = $galleryname;
                }

                foreach ($gallerarray as $img) {
                    $ad_image = new AdPhoto();
                    $ad_image->ad_id = $ad_id;
                    $ad_image->image_path = $imgname;
                    $ad_image->type = "gallery";
                    $ad_image->save();
                }
            }
            return response([
                'success' =>"Ad posted.",
            ], Response::HTTP_OK);
        }else{
            return response([
                'error' =>"Failed to add post.",
            ], Response::HTTP_OK);
        }
    }

    public function favoriteAd(Request $request,$ad_id){
        $user = Auth::user();
        $ad = Ad::find($ad_id);
        if ($user->hasFavorited($ad)){
            $user->toggleFavorite($ad);
            return response([
                'success' =>"removed from favorites",
            ], Response::HTTP_OK);
        }else{
            $user->toggleFavorite($ad);
            return response([
                'success' =>"Added to favorites",
            ], Response::HTTP_OK);
        }


    }

    public function generateUniqueFileName($image, $destinationPath)
    {
        $initial = "openGate_";
        $name = $initial  . bin2hex(random_bytes(8)) . '.' . $image->getClientOriginalExtension();
        if ($image->move(public_path() . $destinationPath, $name)) {
            return $name;
        } else {
            return null;
        }
    }

}
