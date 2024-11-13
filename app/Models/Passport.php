<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    protected $fillable = [
        'Passport_Number',
        'Passport_Expiration_Date',
        'Passport_Issuing_Place',
        'Passport_Issuance_Date',
    ];
}
