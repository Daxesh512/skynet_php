<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    public function portfolios() : HasMany
    {
        return $this->hasMany('App\Models\Portfolio');
    }
    public function language() {
        return $this->belongsTo('App\Language');
    }
}
