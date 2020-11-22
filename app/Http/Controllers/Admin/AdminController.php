<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Hash;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\UploadAdminProfile;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('admin');
    }
    public function loginView()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->intended('admin/dashboard');
        }
        return view('layouts.admin.login');
    }
    public function login(AdminLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = ($request->input('remember') == '1') ? true : false;
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect()->intended('admin/dashboard');
        } else {
            $request->session()->flash('error', 'Credential is not correct');
            return redirect()->back();
        }
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


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
