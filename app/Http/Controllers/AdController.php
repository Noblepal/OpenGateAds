<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdPhoto;
use App\Models\Category;
use App\Models\County;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Image;
class AdController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user_id = Auth::user()->id;
        $ad = new Ad();
        $ad->user_id = $user_id;
        $ad->title = $request->title;
        $ad->category_id = $request->category;
        $ad->county = $request->county;
        $ad->price = $request->price;
        $ad->description = $request->desc;
        if ($ad->save()) {

            $ad_id = $ad->id;
            $imgdestination = 'openGateAds/';
            $gallerarray = [];

            if ($request->hasfile('main_image')) {
                $adImage = $request->file('main_image');
                $imgname = $this->generateUniqueFileNameAd($adImage, $imgdestination);

                $ad_image = new AdPhoto();
                $ad_image->ad_id = $ad_id;
                $ad_image->image_path = $imgname;
                $ad_image->type = "main_image";
                $ad_image->save();
            }

            if ($request->hasfile('gallery')) {

                foreach ($request->file('gallery') as $image) {
                    $galleryname = $this->generateUniqueFileNameAd($image, $imgdestination);
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
                'success' => "Ad posted.",
            ], Response::HTTP_OK);
        } else {
            return response([
                'error' => "Failed to add post.",
            ], Response::HTTP_OK);
        }
    }

    public function updatePost(Request $request){
        $rules = [
            'title' => 'required',
            'category' => 'required',
            'county' => 'required',
            'price' => 'required|integer',
            'desc' => 'required',
//            'main_image' => 'required|mimes:jpeg,png,jpg|max:4048',
        ];
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response([
                'errors' => $error->errors()->all(),
            ], Response::HTTP_OK);
        }
        $ad =  Ad::find($request->id);
        $ad->title = $request->title;
        $ad->category_id = $request->category;
        $ad->county = $request->county;
        $ad->price = $request->price;
        $ad->description = $request->desc;
        if ($ad->update()) {

            $ad_id = $ad->id;
            $imgdestination = 'openGateAds/';
            $gallerarray = [];

            if ($request->hasfile('main_image')) {
                $adImage = $request->file('main_image');
                $imgname = $this->generateUniqueFileNameAd($adImage, $imgdestination);
                $main_image=AdPhoto::where('ad_id',$ad_id)->where('type','main_image')->count();

                $ad_image = new AdPhoto();
                $ad_image->ad_id = $ad_id;
                if ($main_image<=0) {
                    $ad_image->image_path = $imgname;
                    $ad_image->type = "main_image";
                    $ad_image->save();
                }else {
                    AdPhoto::where('ad_id',$ad_id)
                        ->where('type','main_image')->update([
                            'type'=>'main_image',
                            'image_path'=>$imgname
                        ]);
                }

            }

            if ($request->hasfile('gallery')) {

                foreach ($request->file('gallery') as $image) {
                    $galleryname = $this->generateUniqueFileNameAd($image, $imgdestination);
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
                'success' => "Ad updated.",
            ], Response::HTTP_OK);
        } else {
            return response([
                'error' => "Failed to update post.",
            ], Response::HTTP_OK);
        }
    }
    public function editPost($id){
        $ad= Ad::find($id);
        if (Auth::user()->id == $ad->user_id)
        {
            $user = Auth::user();
            $categories = Category::withCount('ads')->get();
            $counties = County::all();
            return view('pages.ad_edit',compact('ad','user','counties','categories'));
        }


    }
    public function deletePost(Request $request){
        $ad= Ad::find($request->ad_id);
        if (Auth::user()->id == $ad->user_id)
        {
            if ($ad->delete()){
                return response([
                    'success' => "Ad deleted successfully.",
                ], Response::HTTP_OK);
            }else{
                return response([
                    'error' => "Ad not deleted.",
                ], Response::HTTP_OK);
            }
        }else{
            return response([
                'error' => "Ad not deleted.",
            ], Response::HTTP_OK);
        }

    }
    public function photoDestroy(Request $request)
    {
        $photo_id = $request->photo_id;
        if (AdPhoto::where('id', $photo_id)->delete()) {
            return response(['success' => 'Photo  deleted Successfully',
            ], Response::HTTP_OK);
        } else {
            return response(['error' => 'Photo not deleted ',
            ], Response::HTTP_OK);
        }
    }

    public function favoriteAd(Request $request)
    {
        $user = Auth::user();
        $ad = Ad::find($request->id);
        if ($user->hasFavorited($ad)) {
            $user->toggleFavorite($ad);
            return response([
                'success' => "removed from favorites",
            ], Response::HTTP_OK);
        } else {
            $user->toggleFavorite($ad);
            return response([
                'success' => "Added to favorites",
            ], Response::HTTP_OK);
        }


    }



    public function generateUniqueFileNameAd($image, $destinationPath)
    {
        $initial = "openGate_";
        $name = $initial . bin2hex(random_bytes(8)) . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->resize(640, 420, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path($destinationPath . $name));
        return $name;
    }
}
