<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'partnership';

    // Kolom yang boleh diisi
    protected $fillable = [
        'mou_moa_ia_number',
        'title_of_cooperation',
        'validity_period',
        'study_program_id',
    ];

    // Relasi dengan StudyProgram
    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class, 'study_program_id', 'ID_study_program');
    }
}
