<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTransportDetail extends Model
{
    use HasFactory;

    protected $table = 'event_transport_details';

    protected $fillable = [
        'event_id',
        'title',
        'price',
        'status',
    ];
}
