<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutboundLecturer extends Model
{
    use HasFactory;

    protected $table = 'outbound_lecturers';

    protected $fillable = [
        'lecturer_name',
        'gender',
        'role_in_ki',
        'university_name',
        'activity_year',
        'ID_study_program',
    ];

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class, 'ID_study_program', 'ID_study_program');
    }
}
