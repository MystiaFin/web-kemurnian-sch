<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        "title",
        "from_school",
        "date",
        "string",
        "news_banner",
        "content",
        "attachment"
    ];

    protected $casts = [
        'attachment' => 'array'
    ];
}
