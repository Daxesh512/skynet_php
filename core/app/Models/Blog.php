<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function bcategory()
    {
        return $this->belongsTo('App\Models\Bcategory');
    }

    public function language() {
        return $this->belongsTo('App\Language');
    }
}
