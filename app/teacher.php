<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
         protected $fillable = [
        'name',
        'email',
        'faculty',
        'lab',
        'assignment',
        // 'created_at' and 'updated_at' are handled by timestamps()
        // 'id' is auto-incrementing
    ];
    /**
     * The attributes that should be hidden for serialization.
     * @var array<int, string>
     */
    protected $hidden = [
        'password', // Hide password when converting to array/JSON
    ];
}
