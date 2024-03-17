<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\LogOptions;

class Category extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name', 'icon', 'status'];

    // Customize the log options
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'icon', 'status'])
            ->useLogName('category')
            ->dontSubmitEmptyLogs()
            ->logOnlyDirty();
    }
}
