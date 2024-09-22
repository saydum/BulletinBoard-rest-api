<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    use HasFactory;

    protected $table = 'bulletins';

    protected $fillable = [
        'name',
        'price',
        'description',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
