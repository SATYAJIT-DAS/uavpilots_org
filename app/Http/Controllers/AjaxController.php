<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;


class AjaxController extends Controller
{
    public function checkusername(Request $request)
    {
        $given_username = $request->message;
        $usernamecheck = UserData::where('username', $given_username)->first();
        if ($usernamecheck === null) {
            return 1;
        } else {
            return 0;
        }
    }
}
