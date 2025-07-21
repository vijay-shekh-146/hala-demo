<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'title',
        'button_title',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'flyer',
        'status',
        'transport_status',
    ];
}
