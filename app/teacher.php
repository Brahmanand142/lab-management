<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
        protected $fillable = [
        'name',
        'email',
        'password',
        'faculty',
        'lab',
        'assignment',
    ];

    /**
     * The attributes that should be hidden for serialization.
     * @var array<int, string>
     */
    protected $hidden = [
        'password', // Hide password when converting to array/JSON
    ];
}
