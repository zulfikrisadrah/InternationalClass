<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'Student_Name',
        'Student_ID_Number',
        'Student_Email',
        'Country_of_Origin',
        'Profile_Photo'
    ];
}
