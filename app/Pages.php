<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = [
        'site_id',
        'name',
        'title',
        'slug',
        'description',
        'keywords',
        'header',
        'body',
        'footer',
    ];
}
