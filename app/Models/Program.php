<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'Program_Name',
        'Level',
        'Program_Description',
        'Approval_Letter_SK',
        'Creation_Year_SK',
        'Website_Link',
        'Program_Head_Name',
        'Program_Head_Contact_No',
        'Classroom_Count',
        'KI_Teacher_Count',
        'IE_Type',
        'Student_UKT_Fee',
        'Student_DP_IPI_Fee',
        'Activity_Photo_Link',
        'International_Accreditation',
        'Programs_Image'
    ];
}
