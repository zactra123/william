<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    protected $table = 'sitesettings';


    // public $rules = [
    //     'email' => 'required',
    // ];

    protected $fillable =[
      'id',
      'first_slider_image',
      'first_slider_title',
      'first_slider_text',
      'first_slider_button_text',
      'first_slider_button_link',
      'second_slider_image',
      'second_slider_title',
      'second_slider_text',
      'second_slider_button_text',
      'second_slider_button_link',
      'third_slider_image',
      'third_slider_title',
      'third_slider_text',
      'third_slider_button_text',
      'third_slider_button_link',
      'address',
      'phone',
      'email',
      'twitter_link',
      'facebook_link',
      'instagram_link',
      'skype_link',
      'linkedin_link'
    ];

}
