<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $primaryKey = 'ID_program';


    protected $fillable = [
        'program_Name',
        'Country_of_Execution',
        'Execution_Date',
        'Participants_Count',
        'program_Image',
        'ID_Ie_program',
        'ID_study_program',
        'ID_Staff'
    ];

    public function ieProgram()
    {
        return $this->belongsTo(IeProgram::class, 'ID_Ie_program', 'ID_Ie_program');
    }
    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class, 'ID_study_program');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'ID_Staff');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'program_enrollment', 'ID_program', 'ID_Student')
                    ->withPivot('status')
                    ->withTimestamps();
    }
}
