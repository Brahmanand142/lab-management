<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
   // protected $table = 'faculties';
   // protected $guarded = ['id'];
   protected $fillable = ['name'];
   
   public function labs()
    {
        return $this->hasMany(Lab::class, 'faculty_id'); // Link back to labs using faculty_id
    }
}

