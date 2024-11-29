<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $primaryKey = 'ID_Event';

    protected $fillable = [
        'Event_Title',
        'Event_Content',
        'Publication_Date',
        'Event_Image',
        'user_id'
    ];

    protected $casts = [
        'Publication_Date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

