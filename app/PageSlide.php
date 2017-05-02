<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageSlide extends Model
{
    protected $fillable = [
        'page_id',
        'priority',
        'bg_color',
        'title',
        'image',
        'subtitle',
        'text'
    ];

    public function page()
    {
        return $this->belongsTo('App\Page');
    }
}
