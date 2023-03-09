<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'is_active',
    ];
    protected $attributes = [
        'is_active' => false
    ];
    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}

