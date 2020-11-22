<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function homepage()
    {
        return view('layouts.frontend.homepage');
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
