<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'title',
        'banner',
        'type',
        'btn_url',
        'starting_price',
        'serial',
        'status',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'banner', 'type', 'btn_url', 'starting_price', 'serial', 'status'])
            ->useLogName('slider')
            ->dontSubmitEmptyLogs()
            ->logOnlyDirty();
    }
}
