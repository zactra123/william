<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';


    public $rules = [
        'title' => 'required',
        'url' => ['required','string', 'max:255','unique:blogs'],
        'article' => 'required',
        'published_date' => 'required',
    ];

    protected $fillable =[
        "title",
        "url",
        "path",
        "article",
        "visited",
        "published_date"
    ];

}
