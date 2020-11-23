<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AjaxController extends Controller
{
    // public static  function checkusername($username)
    // {
    //     return "available";
    // }


    public function checkusername(Request $request)
    {
        

    	$given_username = $request->message;

        $usernamecheck = User::where('username',$given_username)->first();

		if ($usernamecheck === null) {
		   return 1;
		}
		else{
			return 0;
		}

		// return "available";

        
    }
}
