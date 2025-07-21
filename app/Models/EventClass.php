<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventClass extends Model
{
    use HasFactory;
    protected $table = 'event_classes';

    protected $fillable = [
        'event_id',
        'master_class_id',
        'status',
    ];
}
