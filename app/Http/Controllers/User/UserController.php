<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserData;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.user.home');
    }


    public static  function editProfile($id)
    {
        $userdata = static::userDetails($id);
        return view('layouts.user.update_profile_byUser', compact('userdata'));
    }



     public static function userDetails($id)
    {
        $userdata = UserData::where('user_id', $id)->first();
        return $userdata;
    }


    public function UpdateProfilebyUser($id, Request $data)
    {



        $update_status = UserData::where('user_id', $data->id)
            ->update([
                'image' => $data->image,
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'username' => $data->username,
                'description' => $data->description,
                'state' => $data->state,
                'country' => $data->country,
                'industry' => $data->industry,
                'fb_link' => $data->fb_link,
                'twitter_link' => $data->twitter_link,
                'youtube_link' => $data->youtube_link,
                'instagram_link' => $data->instagram_link,
            ]);

        $userdata = static::userDetails($id);

        return view('layouts.user.update_profile_byUser', compact('userdata'));
    }





}
