<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'user_id',

        'company_name',
        'description',
        'phone',
        'email',
        'address',

        'offer',
        'bullets',
        'video',

        'lead_magnet',
        'call_to_action',

        'name_form_enabled',
        'email_form_enabled',
        'phone_form_enabled',
        'comment_form_enabled',

        'background_image',
        'legal_information',

        'lead_magnet_file',
        'subdomain',
        'title',
        'redirect',

        'comments_enabled',

        'google',
        'yandex',
        
        'letter_id',
        'letter',
        'mailchimp_id',
        'mailchimp_list_id'
    ];
    public function leads()
    {
        return $this->hasMany('App\Lead');
    }
}
