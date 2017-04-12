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
        'paided',
        'status',
        'comment',
        'fio'
    ];
    protected $guarded = ['id'];

    public function page()
    {
        return $this->belongsTo('App\Page');
    }
}
