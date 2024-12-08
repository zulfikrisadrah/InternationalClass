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
        'isVerified',
        'user_id',
        'ID_study_program'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class, 'ID_study_program', 'ID_study_program');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'ID_Staff', 'ID_Staff');
    }
    public function programs()
    {
        return $this->belongsToMany(Program::class, 'program_enrollment', 'ID_Student', 'ID_program')
                    ->withPivot('status')
                    ->withTimestamps();
    }
}
