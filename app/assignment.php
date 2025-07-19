<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
     protected $guarded = [
        'assignment_id'
     ];
    protected $primaryKey = 'assignment_id'; 
    
   
}
