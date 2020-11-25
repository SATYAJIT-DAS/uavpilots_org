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
}
