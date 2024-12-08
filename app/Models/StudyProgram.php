<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    protected $primaryKey = 'ID_study_program';
    protected $fillable = [
        'study_program_Name',
        'degree',
        'study_program_Description',
        'International_Accreditation',
        'study_program_Image',
        'ID_Faculty',
        'isFilled'
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'ID_Faculty');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function programs()
    {
        return $this->hasMany(Program::class, 'ID_study_program');
    }
    public function staff()
    {
        return $this->hasMany(Staff::class, 'ID_Study_Program', 'ID_study_program');
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'ID_study_program', 'ID_study_program');
    }
}
