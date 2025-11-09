<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = [];
    
    public function setting() {
        return $this->hasOne('App\Models\Setting');
    }

    public function sectiontitle() {
        return $this->hasOne('App\Models\Sectiontitle');
    }
    public function packages() {
        return $this->hasMany('App\Models\Package');
    }

    public function sliders() {
        return $this->hasMany('App\Models\Slider');
    }

    public function features() {
        return $this->hasMany('App\Models\Feature');
    }

    public function counters() {
        return $this->hasMany('App\Models\Counter');
    }

    public function testimonials() {
        return $this->hasMany('App\Models\Testimonial');
    }

    public function teams() {
        return $this->hasMany('App\Models\Team');
    }

    public function clients() {
        return $this->hasMany('App\Models\Client');
    }

    public function flinks() {
        return $this->hasMany('App\Models\Flink');
    }

    public function daynamicpages() {
        return $this->hasMany('App\Models\Daynamicpage');
    }

    public function services() {
        return $this->hasMany('App\Models\Service');
    }

    public function portfolios() {
        return $this->hasMany('App\Models\Portfolio');
    }

    public function faqs() {
        return $this->hasMany('App\Models\Faq');
    }

    public function bcategories() {
        return $this->hasMany('App\Models\Bcategory');
    }

    public function blogs() {
        return $this->hasMany('App\Models\Blog');
    }

    public function why_selects() {
        return $this->hasMany('App\Models\WhySelect');
    }

    public function histories() {
        return $this->hasMany('App\Models\History');
    }
    public function menus() {
        return $this->hasMany('App\Models\Menu');
    }
    public function products() {
        return $this->hasMany('App\Models\Product');
    }
    public function jobs() {
        return $this->hasMany('App\Models\Job');
    }
    public function galleries() {
        return $this->hasMany('App\Models\Gallery');
    }


}
