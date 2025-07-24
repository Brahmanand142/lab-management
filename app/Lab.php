<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
     protected $fillable = [
        'name',
        'description',
        'status',
        'faculty_id', // <--- IMPORTANT: Add this to fillable
       
    ];

  public function faculties()
  {
        return $this->belongsTo(Faculty::class);
       
         
    }
  }
   
  

