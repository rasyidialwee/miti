<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'user_id'
    ];

    protected $casts = [
        'is_completed' => 'boolean',
    ];

    /**
     * Get the user's first name.
     */
    protected function imagePath(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => 'storage/'. $value,
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
