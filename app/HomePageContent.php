<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePageContent extends Model
{
    protected $table = 'home_page_contents';

    protected $fillable = [
        'category',
        'url',
        'title',
        'sub_content',
        'content'

    ];
}
