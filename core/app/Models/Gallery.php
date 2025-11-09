<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = [];

    public function gcategory()
    {
        return $this->belongsTo('App\Models\Gcategory', 'category_id');
    }

    public function language() {
        return $this->belongsTo('App\Language');
    }
}
