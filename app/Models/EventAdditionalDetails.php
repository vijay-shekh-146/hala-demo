<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAdditionalDetails extends Model
{
    use HasFactory;

    protected $table = 'event_additional_details';

    protected $fillable = [
        'event_id',
        'title',
        'price',
        'order_by',
        'status',
    ];
}
