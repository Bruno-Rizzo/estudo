<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'adv_name',
        'oab_number',
        'date',
        'entrance',
        'exit',
        'prisioner',
        'identity'
    ];

    protected $casts = [
        'prisioner' => 'array',
        'identity'  => 'array',
    ];
}
