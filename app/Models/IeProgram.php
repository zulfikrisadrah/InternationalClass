<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IeProgram extends Model
{
    protected $fillable = [
        'ie_program_name',
    ];

    public function programs()
    {
        return $this->hasMany(Program::class, 'ID_Ie_program');
    }
}
