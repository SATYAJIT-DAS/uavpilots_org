<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UserListDataTable;

class FrontendController extends Controller
{
    //
    public function homepage(UserListDataTable $dataTable)
    {
        return $dataTable->render('layouts.frontend.homepage');
    }
    public function test(UserListDataTable $dataTable)
    {
        return $dataTable->render('test');
    }

    // blog for future
    // public function blog()
    // {
    //     return view('layouts.frontend.blog');
    // }
    // public function singlepage()
    // {
    //     return view('layouts.frontend.singlepage');
    // }
}
