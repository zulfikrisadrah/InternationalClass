<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $primaryKey = 'ID_News';

    protected $fillable = [
        'News_Title',
        'News_Content',
        'Publication_Date',
        'News_Image',
        'user_id'
    ];

    protected $casts = [
        'Publication_Date' => 'datetime',
    ];

}
