<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $primaryKey = 'ID_Faculty';
    
    protected $fillable = [
        'Faculty_Name',
        'Faculty_Code',
    ];
    public function studyPrograms()
    {
        return $this->hasMany(StudyProgram::class, 'ID_Faculty');
    }
}
