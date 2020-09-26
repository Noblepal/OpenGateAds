<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function __construct()
    {
        return redirect('pages.maintenance');
    }

    public function index()
    {
        return view('pages.index');
    }

    public function maintenance()
    {
        return view('pages.maintenance');
    }

    public function dashboard()
    {
        return view('pages.dashboard');
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
        return view('pages.post_ad');
    }

    public function adDetails($id)
    {
        return view('pages.ad_details')->with('id', $id);
    }

    public function favouriteAds()
    {
        return view('pages.acc_fav_ads');
    }

    public function myAds()
    {
        return view('pages.acc_my_ads');
    }

    public function settings()
    {
        return view('pages.acc_settings');
    }
}
