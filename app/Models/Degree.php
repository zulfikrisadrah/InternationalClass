<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $fillable = [
        'Degree',
        'Country_of_Execution',
        'Execution_Date',
    ];
}
