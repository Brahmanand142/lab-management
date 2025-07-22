<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
<<<<<<< HEAD
    //
=======
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
>>>>>>> 6be9f874e5a8fbd3abb9f99985abd48a702cd20d
}
