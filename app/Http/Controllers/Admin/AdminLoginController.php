<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminLoginRequest;

class AdminLoginController extends Controller
{
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
}
