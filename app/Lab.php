<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
       protected $guarded = ['id'];

  public function faculties()
  {
        return $this->belongsTo(Faculty::class,'faculty');
       
    }
  }
   
  

