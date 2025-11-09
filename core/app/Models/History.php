<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public function language() {
        return $this->belongsTo('App\Language');
    }
}
