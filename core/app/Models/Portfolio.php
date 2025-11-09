<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    public function service() : BelongsTo
    {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }

    public function language() {
        return $this->belongsTo('App\Language');
    }
}
