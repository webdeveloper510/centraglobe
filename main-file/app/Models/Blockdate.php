<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blockdate extends Model
{
    protected $table= 'blockdate';
    protected $fillable = [
        'id',
        'start_date',
        'end_date',
        'purpose',
        'created_by',
    ];

}
