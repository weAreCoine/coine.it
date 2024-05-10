<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Str;

    class Upload extends Model
    {
        use HasFactory;

        protected $guarded = ['id'];

        public function posts(): BelongsToMany
        {
            return $this->belongsToMany(Post::class);
        }

        public function postsWhereCover(): HasMany
        {
            return $this->hasMany(Post::class, 'featured_image', 'id');
        }

        public function getPath(): string
        {
            return Str::remove(config('app.url'), $this->url);
        }
    }
