<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutbondLecturer extends Model
{
    protected $fillable = [
        'Partner_Lecturer_Name',
        'Gender',
        'Role',
        'University_Origin',
        'Activity_Year',
    ];
}
