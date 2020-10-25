<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use Yajra\Datatables\Datatables;
use Image;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_ads = Ad::count();
        $total_users = User::whereHas('roles', function ($query) {
        return $query->where('name', 'Normal User');
    })->count();
        return view('admin.dashboard',compact('total_ads','total_users'));
    }

    public function adsIndex(Request $request)
    {
        $categories = Category::all();
        if ($request->ajax()) {
            $ads = Ad::with('category')->with('user')->orderByDesc('created_at')->get();
            return Datatables::of($ads)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $start = '<div class="btn-group"><button type="button" class="btn btn-info">Action</button>
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span><div class="dropdown-menu" role="menu"><a class="dropdown-item delete" id="' . $data->id . '" onclick="deleteAd(\'' . $data->id . '\')">Delete</a>';
                    $end = '</div></button></div>';
                    if ($data->is_active == 1) {
                        $isactive = '<a class="dropdown-item deactivate" id="' . $data->id . '" onclick="toggleActivate(\'' . $data->id . '\')">Deactivate</a>';
                    } else {
                        $isactive = '<a class="dropdown-item activate" id="' . $data->id . '" onclick="toggleActivate(\'' . $data->id . '\')">Activate</a>';
                    }
                    if ($data->is_featured === 1) {
                        $isfeatured = '<a class="dropdown-item deactivate" id="' . $data->id . '" onclick="toggleFeature(\'' . $data->id . '\')">Un-Feature</a>';
                    } else {
                        $isfeatured = '<a class="dropdown-item deactivate" id="' . $data->id . '" onclick="toggleFeature(\'' . $data->id . '\')">Feature</a>';
                    }
                    return $start . $isactive . $isfeatured . $end;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.ads_index');
    }

    public function adsEdit($id)
    {
        $ad = Ad::find($id);
        return view('admin.ad_edit', compact('ad'));
    }

    public function adsUpdate(Request $request)
    {

    }

    public function adsDelete(Request $request)
    {
        $ad_id = $request->id;
        $ad = Ad::find($ad_id);
        if ($ad->delete()) {
            $ad->is_active = 0;
            return response(['success' => 'Ad  deleted.',
            ], Response::HTTP_OK);
        } else {
            return response(['error' => 'An error occurred.',
            ], Response::HTTP_OK);
        }
    }

    public function adsActivate(Request $request)
    {
        $ad_id = $request->id;
        $ad = Ad::find($ad_id);
        if ($ad->is_active == 1) {
            $ad->is_active = 0;
            $ad->update();
            return response(['success' => 'Ad  deactivated.',
            ], Response::HTTP_OK);
        } else {
            $ad->is_active = 1;
            $ad->update();
            return response(['success' => 'Ad  activated.',
            ], Response::HTTP_OK);
        }

    }

    public function adsFuture(Request $request)
    {

        $ad_id = $request->id;
        $ad = Ad::find($ad_id);
        if ($ad->is_featured == 1) {
            $ad->is_featured = 0;
            $ad->update();
            return response(['success' => 'Ad  removed as featured.',
            ], Response::HTTP_OK);
        } else {
            $ad->is_featured = 1;
            $ad->update();
            return response(['success' => 'Ad  is now featured.',
            ], Response::HTTP_OK);
        }
    }


    public function CategoryIndex(Request $request)
    {

        if ($request->ajax()) {
            $categories = Category::all();
            return Datatables::of($categories)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $start = '<div class="btn-group"><button type="button" class="btn btn-info">Action</button>
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span><div class="dropdown-menu" role="menu"><a class="dropdown-item" id="' . $data->id . '" onclick="deleteCat(\'' . $data->id . '\')">Delete</a>
                      <a onclick=redirectTo("' . route('admin.category.edit', $data->id) . '") class="dropdown-item">Edit</a>';
                    $end = '</div></button></div>';
                    return $start . $end;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.category');
    }

    public function CategoryAdd(Request $request)
    {
        $rules = [
            'name' => 'required',
            'icon' => 'required|mimes:jpeg,png,jpg|max:4048',
        ];

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response(['errors' => $error->errors()->all(),
            ], Response::HTTP_OK);
        }

        $imgdestination = 'CategoryImages/';
        if ($request->hasfile('icon')) {
            $image = $request->file('icon');
            $imgname = $this->generateUniqueFileNameCat($image, $imgdestination);
        }
        $category = new Category();
        $category->name = $request->name;
        $category->icon_name = $imgname;

        if ($category->save()) {
            return response(['success' => 'Category  added.',
            ], Response::HTTP_OK);
        } else {
            return response(['error' => 'An error occurred.',
            ], Response::HTTP_OK);
        }
    }

    public function CategoryEdit($id)
    {
        $category = Category::where('id', $id)->first();


        return view('admin.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request)
    {
        $rules = [
            'name' => 'required',
//            'icon' => 'required|mimes:jpeg,png,jpg|max:4048',
        ];

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response(['errors' => $error->errors()->all(),
            ], Response::HTTP_OK);
        }
        $category = Category::find($request->id);

        $imgdestination = 'CategoryImages/';
        if ($request->hasfile('icon')) {
            $image = $request->file('icon');
            $imgname = $this->generateUniqueFileNameCat($image, $imgdestination);
            $category->icon_name = $imgname;
        }

        $category->name = $request->name;


        if ($category->update()) {
            return response(['success' => 'Category  updated.',
            ], Response::HTTP_OK);
        } else {
            return response(['error' => 'An error occurred.',
            ], Response::HTTP_OK);
        }
    }

    public function CategoryDelete(Request $request)
    {
        $id = $request->id;
        $categpry = Category::find($id);
        if ($categpry->delete()) {
            return response(['success' => 'Category  deleted.',
            ], Response::HTTP_OK);
        } else {
            return response(['error' => 'An error occurred.',
            ], Response::HTTP_OK);
        }
    }


    public function userIndex(Request $request)
    {
        $users = User::withCount('ads')->with('roles')->get();
        if ($request->ajax()) {
            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $start = '<div class="btn-group"><button type="button" class="btn btn-info">Action</button>
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span><div class="dropdown-menu" role="menu"><a class="dropdown-item" id="' . $data->id . '" onclick="deleteUser(\'' . $data->id . '\')">Delete</a>
                      <a onclick=redirectTo("' . route('admin.user.edit', $data->id) . '") class="dropdown-item">Edit</a>';
                    $end = '</div></button></div>';
                    return $start . $end;
                })->addColumn('ads_count', function ($data) {
                    return '<div class="text-center"><a class="p-3">' . $data->ads_count . '</a><a href="' . route('admin.user.ads', $data->id) . '">view</a></div>';
                })->addColumn('roles', function ($data) {
                    $start = '<ul style="list-style-type: none">';
                    foreach ($data->roles as $role) {
                        $start .= '<li>' . $role->name . '</li>';
                    }
                    $end = '</ul>';
                    return $start . $end;
                })
                ->rawColumns(['action', 'ads_count', 'roles'])
                ->make(true);
        }
        $roles = Role::all();
        return view('admin.users', compact('roles'));
    }

    public function UserEdit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.user_edit', compact('user', 'roles'));
    }

    public function UserAds(Request $request, $id)
    {
        $categories = Category::all();
        $user = User::find($id);
        if ($request->ajax()) {
            $ads = Ad::with('category')->with('user')->where('user_id', $id)->orderByDesc('created_at')->get();
            return Datatables::of($ads)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $start = '<div class="btn-group"><button type="button" class="btn btn-info">Action</button>
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span><div class="dropdown-menu" role="menu"><a class="dropdown-item delete" id="' . $data->id . '" onclick="deleteAd(\'' . $data->id . '\')">Delete</a>';
                    $end = '</div></button></div>';
                    if ($data->is_active == 1) {
                        $isactive = '<a class="dropdown-item deactivate" id="' . $data->id . '" onclick="toggleActivate(\'' . $data->id . '\')">Deactivate</a>';
                    } else {
                        $isactive = '<a class="dropdown-item activate" id="' . $data->id . '" onclick="toggleActivate(\'' . $data->id . '\')">Activate</a>';
                    }
                    if ($data->is_featured === 1) {
                        $isfeatured = '<a class="dropdown-item deactivate" id="' . $data->id . '" onclick="toggleFeature(\'' . $data->id . '\')">Un-Feature</a>';
                    } else {
                        $isfeatured = '<a class="dropdown-item deactivate" id="' . $data->id . '" onclick="toggleFeature(\'' . $data->id . '\')">Feature</a>';
                    }
                    return $start . $isactive . $isfeatured . $end;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.user_ads', compact('user'));
    }

    public function AdminSideRegister(Request $request)
    {
        $rules = [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'roles' => ['required', 'array'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => [ 'required','integer'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response([
                'errors' => $error->errors()->all(),
            ], Response::HTTP_OK);
        }

        $password = Hash::make($request->password);

        $user = new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $password; //hashed password.
        if ($request->hasfile('profile_pic')) {
            $imgdestination = 'ProfilePics/';
            $profile_pic = $request->file('profile_pic');
            $imgname = $this->generateUniqueFileNameProfile($profile_pic, $imgdestination);
            $user->profile_pic = $imgname;

        }
        if ($user->save()) {

            $user->assignRole($request->input('roles'));

            return response(['success' => 'User Added.',
            ], Response::HTTP_OK);

        } else {
            return response(['error' => 'An error occurred.',
            ], Response::HTTP_OK);
        }
    }

    public function AdminUserUpdate(Request $request)
    {
        $rules = [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'roles' => ['required', 'array'],
            'phone' => [ 'required','integer'],
            'password' => ['confirmed'],
        ];
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response([
                'errors' => $error->errors()->all(),
            ], Response::HTTP_OK);
        }

        $user = User::find($request->id);

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }


        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        if ($request->hasfile('profile_pic')) {
            $imgdestination = 'ProfilePics/';
            $profile_pic = $request->file('profile_pic');
            $imgname = $this->generateUniqueFileNameProfile($profile_pic, $imgdestination);
            $user->profile_pic = $imgname;

        }
        if ($user->save()) {

            $user->assignRole($request->input('roles'));

            return response(['success' => 'User updated.',
            ], Response::HTTP_OK);

        } else {
            return response(['error' => 'An error occurred.',
            ], Response::HTTP_OK);
        }
    }

    public function UserDelete(Request $request)
    {
        $user = User::find($request->id);
        if ($user->delete()){
            return response(['success' => 'User Deleted.',
            ], Response::HTTP_OK);
        }else{
            return response(['error' => 'An error occurred.',
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


    public function generateUniqueFileNameCat($image, $destinationPath)
    {
        $initial = "openGate_";
        $name = $initial . bin2hex(random_bytes(8)) . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->resize(98, 78, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path($destinationPath . $name));
        return $name;
    }
}
