<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gcategory extends Model
{
    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery', 'id');
    }
    public function language() {
        return $this->belongsTo('App\Language');
    }
}
