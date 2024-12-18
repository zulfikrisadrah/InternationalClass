<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $primaryKey = 'ID_program';


    protected $fillable = [
        'program_Name',
        'program_description',
        'Country_of_Execution',
        'Execution_Date',
        'End_Date',
        'Participants_Count',
        'Course_Credits',
        'program_Image',
        'ID_Ie_program',
        'ID_Staff',
        'user_id'
    ];

    public function ieProgram()
    {
        return $this->belongsTo(IeProgram::class, 'ID_Ie_program', 'ID_Ie_program');
    }
    public function studyProgram()
    {
        return $this->belongsToMany(StudyProgram::class, 'program_study_program', 'program_id', 'study_program_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function logbooks()
    {
        return $this->hasMany(Logbook::class, 'ID_program');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'program_enrollment', 'ID_program', 'ID_Student')
                    ->withPivot('status', 'isFinished')
                    ->withTimestamps();
    }
}
