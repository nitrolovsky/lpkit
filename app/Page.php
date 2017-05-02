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
        'money_button',

        'background_image',
        'legal_information',

        'case_enabled',
        'case_title',
        'case_video_1',
        'case_text_1',
        'case_video_2',
        'case_text_2',
        'case_video_3',
        'case_text_3',
        'case_video_4',
        'case_text_4',
        'case_video_5',
        'case_text_5',
        'case_video_6',
        'case_text_6',
        'case_video_7',
        'case_text_7',
        'case_video_8',
        'case_text_8',
        'case_video_9',
        'case_text_9',

        'slides_number',

        'comments_enabled',

        'lead_magnet_file',
        'domain',
        'subdomain',
        'title',
        'redirect',

        'google',
        'yandex',
        'yandex_target_button',
        'lptracker',
        'lptracker_phone',

        'mailchimp_api_key',
        'mailchimp_list_id'
    ];
    public function leads()
    {
        return $this->hasMany('App\Lead');
    }
    public function slides()
    {
        return $this->hasMany('App\PageSlide');
    }
}
