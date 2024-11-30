<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'Staff_Name',
        'ID_study_program',
        'user_id',
    ];

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class, 'ID_study_program');
    }

    public function programs()
    {
        return $this->hasMany(Program::class, 'ID_Staff');
    }
}
