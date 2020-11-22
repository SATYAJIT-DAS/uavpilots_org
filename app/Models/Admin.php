<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hash;

class Admin extends Authenticatable
{
    //
    use Notifiable;

    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status', 'type', 'email', 'password', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public static  function checkPassword($password)
    {
        if (Hash::check($password, Auth::guard('admin')->user()->password)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public static  function UpdatePassword($Currentpassword, $newpassword, $confirmnewpassword, $request)
    {
        if (Hash::check($Currentpassword, Auth::guard('admin')->user()->password)) {
            if ($newpassword == $confirmnewpassword) {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($newpassword)]);
                $request->session()->flash('success', 'Password updated');
            } else {
                $request->session()->flash('error', 'New password and Confirm Password Doesn\'t match');
            }
        } else {
            $request->session()->flash('error', 'Current password Doesn\'t match');
        }
    }

    public static function uploadimage($image)
    {
        $filename = time() . '.' . $image->getClientOriginalExtension();
        (new self())->deleteOldImg();
        $image->storeAs('admin/images', $filename, 'public');
        Auth::guard('admin')->user()->update(['image' => $filename]);
    }

    protected function deleteOldImg()
    {
        $img = Auth::guard('admin')->user()->image;
        if ($img) {
            Storage::delete('/public/admin/images/' . $img);
        }
    }
}
