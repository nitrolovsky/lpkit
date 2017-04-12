<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'page_id',
        'source',

        'name',
        'email',
        'phone',

        'address',
        'size',
        'color',
        'comment',
        'fio',

        'paided',
        'status'
    ];
    protected $guarded = ['id'];

    public function page()
    {
        return $this->belongsTo('App\Page');
    }
}
