<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'banner',
        'type',
        'btn_url',
        'starting_price',
        'serial',
        'status',
    ];
}
