<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billingdetail extends Model
{
    use HasFactory;
    protected $table = 'billingdetails';
    protected $fillable = [
        'user_id',
        'event_id',
        'venue_rental',
        'hotel_rooms',
        'equipment',
        'setup',
        'food'
    ];
}
