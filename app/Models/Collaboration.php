<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    protected $fillable = [
        'MoU_MoA_IA_Number',
        'Collaboration_Title',
        'Validity_Period',
    ];
}
