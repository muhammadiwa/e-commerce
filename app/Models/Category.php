<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Category extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name', 'icon', 'status'];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

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
