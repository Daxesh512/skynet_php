<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;
    public function jcategory()
    {
    	return $this->belongsTo('App\Models\Jcategory');
    }
}
