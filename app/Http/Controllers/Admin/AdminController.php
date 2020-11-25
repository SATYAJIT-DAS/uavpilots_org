<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Http\Requests\UploadAdminProfile;
use App\Models\UserData;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function dashboard()
    {
        $adminDetails = $this->getAdminDetails();
        return view('layouts.admin.home', compact('adminDetails'));
    }

    public function settings()
    {
        $adminDetails = $this->getAdminDetails();
        return view('layouts.admin.settings', compact('adminDetails'));
    }

    protected function getAdminDetails()
    {
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        return $adminDetails;
    }

    public function chkCurrentPwd(Request $request)
    {
        $data = $request->all();
        Admin::checkPassword($data['current_pwd']);
    }

    public function updatePwd(Request $request)
    {
        $data = $request->all();
        Admin::UpdatePassword($data['current_pwd'], $data['new_pwd'], $data['confirm_new_pwd'], $request);
        return redirect()->back();
    }
    public function updateProfileimg(UploadAdminProfile $request)
    {
        if ($request->hasFile('admin_img')) {
            Admin::uploadimage($request->admin_img);
            return back()->with('success', 'Image Upload successfully');
        } else {
            return back()->with('error', 'There was an error');
        }
    }

    public function pendingUserData()
    {
        $usersdata = DB::table('user_data')
            ->join('users', function ($join) {
                $join->on('users.id', '=', 'user_data.user_id')
                    ->where('status', false);
            })
            ->get();
        return Datatables::of($usersdata)
            ->addColumn('action', function ($usersdata) {
                $action = '<button type="button"  class="btn btn-success m-1 approve-button"  id="' . $usersdata->id . '"> Approve</a>';
                $action .=
                    '<button type="button"  class="btn btn-danger m-2 delete-button"  id="' . $usersdata->id . '"> Delete</a>';
                $action .= '<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">';
                return $action;
            })
            ->addColumn('fullname', function ($usersdata) {
                $actionBtn = $usersdata->first_name . ' ' . $usersdata->last_name;
                return $actionBtn;
            })
            ->addColumn('link', function ($usersdata) {
                $link = '<a target="_blank" href="' .  route('profile', $usersdata->username) . '">' . $usersdata->username . '</a>';
                return $link;
            })
            ->rawColumns(['link', 'action', 'fullname'])
            ->make(true);
    }
    public function activeUserData()
    {
        $usersdata = DB::table('user_data')
            ->join('users', function ($join) {
                $join->on('users.id', '=', 'user_data.user_id')
                    ->where('status', True);
            })
            ->get();
        return Datatables::of($usersdata)
            ->addColumn('action', function ($usersdata) {

                $action = '<a class="btn btn-success m-1" href="' . route('admin.updateuserview', $usersdata->id) . '">Edit</a>';
                $action .= '<button type="button"  class="btn btn-success m-1 unpublish-button"  id="' . $usersdata->id . '"> Unpublish</a>';
                $action .=
                    '<button type="button"  class="btn btn-danger m-1 delete-active-user-button "  id="' . $usersdata->id . '"> Delete</a>';
                $action .= '<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">';
                return $action;
            })
            ->addColumn('fullname', function ($usersdata) {
                $actionBtn = $usersdata->first_name . ' ' . $usersdata->last_name;
                return $actionBtn;
            })
            ->addColumn('link', function ($usersdata) {
                $link = '<a target="_blank" href="' .  route('profile', $usersdata->username) . '">' . $usersdata->username . '</a>';
                return $link;
            })
            ->rawColumns(['link', 'action', 'fullname'])
            ->make(true);
    }


    public function UpdateUserView($id)
    {
        $userdata = $this->userDetails($id);
        $adminDetails = $this->getAdminDetails();
        return view('layouts.admin.update_profile', compact('userdata', 'adminDetails'));
    }

    public function UpdateUser($id, Request $data)
    {
        if ($data->hasFile('user_image')) {
            $profileImage = $data->file('user_image');
            $filename = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->storeAs('users/images', $filename, 'public');
            $userdata = $this->userDetails($id);
            if (!empty($userdata->user_image)) {
                Storage::delete('/public/users/images/' . $userdata->user_image);
            }
            UserData::where('user_id', $data->id)
                ->update([
                    'user_image' => $filename,
                ]);
        }
        UserData::where('user_id', $data->id)
            ->update([
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'description' => $data->description,
                'state' => $data->state,
                'country' => $data->country,
                'industry' => $data->industry,
                'fb_link' => $data->fb_link,
                'twitter_link' => $data->twitter_link,
                'youtube_link' => $data->youtube_link,
                'instagram_link' => $data->instagram_link,
            ]);

        $userdata = $this->userDetails($id);
        $adminDetails = $this->getAdminDetails();

        return view('layouts.admin.update_profile', compact('userdata', 'adminDetails'));
    }

    protected function userDetails($id)
    {
        $userdata = DB::table('user_data')->where('user_id', $id)->first();
        return $userdata;
    }
    public function approveUser()
    {
        $data = $_POST['approve_id'];
        User::where('id', $data)->update(['status' => true]);
    }

    public function unpublishUser()
    {
        $data = $_POST['unpublish_id'];
        User::where('id', $data)->update(['status' => false]);
    }
    public function removeUser()
    {
        $data = $_POST['delete_id'];
        User::where('id', $data)->delete();
        UserData::where('user_id', $data)->delete();
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
