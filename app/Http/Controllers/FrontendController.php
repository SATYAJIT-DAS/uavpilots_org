<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;
use Yajra\Datatables\Datatables;

class FrontendController extends Controller
{
    //
    public function homepage()
    {
        return view('layouts.frontend.homepage');
    }
    public function getBasicData()
    {
        $usersdata = UserData::select(['id', 'state', 'country', 'created_at', 'updated_at']);
        return Datatables::of($usersdata)
            ->addColumn('link', function ($usersdata) {
                $actionBtn = '<a href="' . route('profile') . '">' . $usersdata->country . '</a>';
                return $actionBtn;
            })
            ->rawColumns(['link'])
            ->make(true);
    }
}
