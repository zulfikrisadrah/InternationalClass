<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'News_Title',
        'News_Content',
        'Publication_Date',
        'News_Image'
    ];
}
