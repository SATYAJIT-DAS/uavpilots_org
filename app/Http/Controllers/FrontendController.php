<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    //
    public function homepage()
    {
        return view('layouts.frontend.homepage');
    }
    public function getBasicData()
    {
        $usersdata = UserData::select(['id', 'industry', 'username', 'country', 'state']);
        return Datatables::of($usersdata)
            ->addColumn('name', function ($usersdata) {
                $actionBtn = '<a href="' . route('profile', $usersdata->username) . '">' . $usersdata->username . '</a>';
                return $actionBtn;
            })
            ->addColumn('location', function ($usersdata) {
                $actionBtn = $usersdata->country . ' ,' . $usersdata->state;
                return $actionBtn;
            })
            ->rawColumns(['name', 'location'])
            ->make(true);
    }
    public function singleUser($username)
    {
        $userdata = $this->userDetails($username);
        return view('layouts.frontend.profile', compact('userdata'));
    }
    protected function userDetails($username)
    {
        $userdata = DB::table('user_data')->where('username', $username)->first();
        return $userdata;
    }
}
