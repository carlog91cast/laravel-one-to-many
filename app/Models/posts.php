<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $fillable = [
        'author',
        'title',
        'post_image',
        'post_content',
        'post_date',
    ];
}
