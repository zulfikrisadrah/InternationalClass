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
        'Program_Image',
        'ID_Ie_program'
    ];

    public function ieProgram()
    {
        return $this->belongsTo(IeProgram::class, 'ID_Ie_program');
    }
}
