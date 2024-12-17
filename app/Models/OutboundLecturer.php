<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutboundLecturer extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'outbound_lecturers';

    // Kolom yang boleh diisi
    protected $fillable = [
        'lecturer_name',
        'gender',
        'role_in_ki',
        'university_name',
        'activity_year',
        'study_program_id',
    ];

    // Relasi dengan StudyProgram
    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class, 'study_program_id', 'ID_study_program');
    }
}
