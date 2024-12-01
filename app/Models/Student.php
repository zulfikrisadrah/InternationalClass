<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'ID_Student'; 

    protected $fillable = [
        'Student_Name',
        'Student_ID_Number',
        'Student_Email',
        'Country_of_Origin',
        'Profile_Photo',
        'isActive',
        'user_id',
        'ID_study_program'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
