<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function dashboard(){
        return view('pages.dashboard');
    }

    public function categories(){
        return view('pages.categories');
    }

    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function postAd(){
        return view('pages.post_ad');
    }

    public function adDetails($id){
        return view('pages.ad_details')->with('id', $id);
    }

    public function favouriteAds(){
        return view('pages.acc_fav_ads');
    }

    public function myAds(){
        return view('pages.acc_my_ads');
    }

    public function settings(){
        return view('pages.acc_settings');
    }
}
