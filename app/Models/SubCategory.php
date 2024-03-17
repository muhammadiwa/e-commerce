<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'category_id',
        'slug',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    // Customize the log description if needed
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'category_id', 'slug', 'status'])
            ->useLogName('sub-category')
            ->dontSubmitEmptyLogs()
            ->logOnlyDirty();
    }

}
