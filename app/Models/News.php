<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $primaryKey = 'ID_News';

    protected $fillable = [
        'News_Title',
        'News_Content',
        'Publication_Date',
        'News_Image',
        'user_id',
        'ID_study_program',
    ];

    protected $casts = [
        'Publication_Date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class, 'ID_study_program');
    }

}
