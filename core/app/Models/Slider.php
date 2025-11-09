<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function language() {
        return $this->belongsTo('App\Language');
    }
}
