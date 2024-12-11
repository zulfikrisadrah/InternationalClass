<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $primaryKey = 'ID_Event';

    protected $fillable = [
        'Event_Title',
        'Event_Content',
        'Publication_Date',
        'Event_Date',
        'Event_Image',
        'user_id',
        'ID_study_program',
    ];

    protected $casts = [
        'Publication_Date' => 'datetime',
        'Event_Date' => 'date',
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

