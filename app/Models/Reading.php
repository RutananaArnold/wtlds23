<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_id',
        'sensor1Reading',
        'sensor2Reading',
        'date',
        'time',
    ];
}
