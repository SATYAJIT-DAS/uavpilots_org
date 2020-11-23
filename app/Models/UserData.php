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
        'frst_name', 'last_name', 'country', 'state', 'industry', 'description', 'image'
    ];
}
