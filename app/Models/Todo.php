<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        "id",
        "name",
        "description",
        "image_path",
        "is_completed",
        "completed_at",
    ];

    protected $casts = [
        'is_completed' => 'boolean',
    ];
}
