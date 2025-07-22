<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   
      protected $fillable = [
        'name',
        'email',
        'faculty',
        'lab_id',
        'assignment_id',
        // 'password' is NOT in your students table, so don't include it here
    ];
}

 
