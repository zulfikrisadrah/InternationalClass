<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    use HasFactory;

    protected $table = 'partnership';
    protected $primaryKey = 'ID_partnership';

    protected $fillable = [
        'mou_moa_ia_number',
        'title_of_cooperation',
        'validity_period',
        'ID_study_program',
    ];

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class, 'ID_study_program', 'ID_study_program');
    }
    
}
