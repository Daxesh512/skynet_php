<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bcategory extends Model
{
    public function blogs()
    {
        return $this->hasMany('App\Models\Blog');
    }
    public function language() {
        return $this->belongsTo('App\Language');
    }
}
