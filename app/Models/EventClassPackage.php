<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventClassPackage extends Model
{
    use HasFactory;

    protected $table = 'event_class_packages';

    protected $fillable = [
        'event_class_id',
        'title',
        'price',
        'status',
    ];
}
