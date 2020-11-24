<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{

    // protected $table = "user_data";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'first_name', 'last_name', 'description', 'state', 'country', 'industry', 'image',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // public static function uploadimage($image)
    // {
    //     $filename = time() . '.' . $image->getClientOriginalExtension();
    //     (new self())->deleteOldImg();
    //     $image->storeAs('user/images', $filename, 'public');
    //     Auth::guard()->user()->update(['image' => $filename]);
    // }

    // protected function deleteOldImg()
    // {
    //     $img = Auth::guard()->user()->image;
    //     $img = UserData::where('age', '29')->pluck('name')
    //     if ($img) {
    //         Storage::delete('/public/user/images/' . $img);
    //     }
    // }
}
