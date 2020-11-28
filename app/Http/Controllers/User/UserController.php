<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserData;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
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

    public function editProfile($id)
    {
        $userdata = $this->userDetails($id);
        return view('layouts.user.update_profile', compact('userdata'));
    }

    public function userDetails($id)
    {
        $userdata = UserData::where('user_id', $id)->first();
        return $userdata;
    }

    public function updateProfile($id, Request $data)
    {
        if ($data->hasFile('user_image')) {
            $profileImage = $data->file('user_image');
            $filename = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->storeAs('users/images', $filename, 'public');
            $userdata = $this->userDetails($id);
            if (!empty($userdata->user_image)) {
                Storage::delete('/public/users/images/' . $userdata->user_image);
            }
            UserData::where('user_id', $data->id)
                ->update([
                    'user_image' => $filename,
                ]);
        }
        UserData::where('user_id', $data->id)
            ->update([
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'description' => $data->description,
                'state' => $data->state,
                'country' => $data->country,
                'industry' => $data->industry,
                'fb_link' => $data->fb_link,
                'twitter_link' => $data->twitter_link,
                'youtube_link' => $data->youtube_link,
                'instagram_link' => $data->instagram_link,
            ]);

        $userdata = $this->userDetails($id);
        return view('layouts.user.update_profile', compact('userdata'));
    }
}
