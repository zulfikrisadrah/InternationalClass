<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IeActivity extends Model
{
    protected $primaryKey = 'ID_Activity';

    protected $fillable = [
        'Activity_Name',
        'Country_of_Execution',
        'Execution_Date',
        'Participants_Count',
        'IeActivity_Image',
        'ID_Program'
    ];
}
