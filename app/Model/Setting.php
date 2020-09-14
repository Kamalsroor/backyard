<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
	protected $table    = 'settings';
	protected $fillable = [
		'sitename_ar',
		'sitename_en',
		'sitename_fr',
		'email',
		'logo',
		'icon',
		'system_status',
		'system_message',
		'address',
		'phone',
		'discover_me_titel',
		'discover_me_des',
		'discover_me_video',
		'trainees',
		'lectures',
		'events',
		'company',
		'personal_information',
		'facebook',
		'twitter',
		'instagram',
		'linkedin',
		'youtube',
		'home_photo',

		'home_title',
		'home_des',
		'cart_img',


		

		'event_photo',
		'about_video',
		'our_courses_photo',
		'privacy_policy',
		'refund_policy',
		'legal_trademark_and_copyright',
		'terms_of_use',
		'whats_number',
		'about_info',
		'about_education',
		'about_company',
		'about_me_photo',
		'about_me_facebook',
		'about_me_twitter',
		'about_me_instagram',
		'about_me_youtube',
		'about_company_photo',

		
		'register_img',
		'experts_in_img',
		'free_lessons_img',
		'our_clients_img',
		'courses_img',
		'mail_img',
		
		
		
		
	];

}






