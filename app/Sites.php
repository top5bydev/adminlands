<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    protected $fillable = [
        'title',
        'name',
        'desc',
        'keywords',
        'body',
        'header',
        'footer',
        'counters',
        'template',
    ];
}
