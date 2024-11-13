<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LectureSchedule extends Model
{
    protected $fillable = [
        'Day',
        'Start_Time',
        'End_Time',
    ];
}
