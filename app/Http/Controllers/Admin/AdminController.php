<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Http\Requests\UploadAdminProfile;
use App\Models\UserData;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

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
                $action = '<button type="button"  class="btn btn-success my-1 approve-button"  id="' . $usersdata->id . '"> Approve</a>';
                $action .=
                    '<button type="button"  class="btn btn-danger my-2 delete-button"  id="' . $usersdata->id . '"> Delete</a>';
                $action .= '<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">';
                return $action;
            })
            ->addColumn('link', function ($usersdata) {
                $link = '<a href="' . route('profile') . '">' . $usersdata->country . '</a>';
                return $link;
            })
            ->rawColumns(['link', 'action'])
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
                // $action = '<button type="button"  class="btn btn-success my-1 approve-button"  id="' . $usersdata->id . '"> Approve</a>';
                $action = '<a href="' . route('admin.updateuser', $usersdata->id) . '">Edit</a>';
                $action .=
                    '<button type="button"  class="btn btn-danger my-1 delete-active-user-button "  id="' . $usersdata->id . '"> Delete</a>';
                $action .= '<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">';
                return $action;
            })
            ->addColumn('link', function ($usersdata) {
                $link = '<a href="' . route('profile') . '">' . $usersdata->country . '</a>';
                return $link;
            })
            ->rawColumns(['link', 'action'])
            ->make(true);
    }


    public function UpdateUser($id)
    {
        $usersdata = $this->userDetails($id);
        $adminDetails = $this->getAdminDetails();
        return view('layouts.admin.update_profile', compact('usersdata', 'adminDetails'));
    }

    protected function userDetails($id)
    {
        $usersdata = DB::table('user_data')->where('id', $id)->first();
        return $usersdata;
    }
    public function approveUser()
    {
        $data = $_POST['approve_id'];
        User::where('id', $data)->update(['status' => true]);
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
