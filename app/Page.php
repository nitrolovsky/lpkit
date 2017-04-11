<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'user_id',
        'project_id',

        'subdomain',

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

        'title',
        'redirect',
        'lead_magnet_file',

        'comments_enabled',
        'google',
        'yandex',
        'letter_id',
        'letter',
        'mailchimp_id',
        'mailchimp_list_id'
    ];
}
