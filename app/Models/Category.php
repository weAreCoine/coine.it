<?php

namespace App\Models;

use App\Traits\ToOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, ToOptions;

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
