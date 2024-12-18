<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    protected $primaryKey = 'ID_Logbook';

    protected $fillable = [
        'Logbook_Name',
        'Start_Time',
        'End_Time',
        'Logbook_Description',
        'Logbook_Image',
        'user_id',
        'ID_program',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function programs()
    {
        return $this->belongsTo(Program::class, 'ID_program');
    }
}
