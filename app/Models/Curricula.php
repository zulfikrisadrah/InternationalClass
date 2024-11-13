<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curricula extends Model
{
    protected $fillable = [
        'Total_Courses',
        'Total_English_RPS',
        'Total_English_Learning_Materials',
        'Total_Courses_Taught_In_English',
        'Total_Courses_In_School',
    ];
}
