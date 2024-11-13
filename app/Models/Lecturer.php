<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'Lecturer_Name',
        'NIP',
        'Lecturer_Email',
    ];
}
