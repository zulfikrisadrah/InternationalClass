<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'start',
        'end',
        'location'
    ];
}
