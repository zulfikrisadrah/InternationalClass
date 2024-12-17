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
        'classrooms',
        'lecturers',
        'national_accreditation',
        'international_accreditation',
        'approval_sk',
        'opening_year',
        'manager_name',
        'manager_contact',
        'ukt_fee',
        'ipi_fee',
        'international_exposure',
        'ID_Faculty',
        'total_courses',
        'rps_courses_in_english',
        'teaching_materials_in_english',
        'courses_delivered_in_english',      
        'courses_fully_filled_in_sikola',
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
        return $this->belongsToMany(Program::class, 'program_study_program', 'study_program_id', 'program_id');
    }
    public function staff()
    {
        return $this->hasMany(Staff::class, 'ID_Study_Program', 'ID_study_program');
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'ID_study_program', 'ID_study_program');
    }
    public function news()
    {
        return $this->hasMany(News::class, 'ID_study_program');
    }
    public function event()
    {
        return $this->hasMany(Event::class, 'ID_study_program');
    }
}
