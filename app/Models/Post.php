<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Laravel\Scout\Searchable;

    class Post extends Model
    {
        use HasFactory, Searchable;

        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function tags(): BelongsToMany
        {
            return $this->belongsToMany(Tag::class);
        }

        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
        }

        public function uploads(): BelongsToMany
        {
            return $this->belongsToMany(Upload::class);
        }

        public function featuredImage(): BelongsTo
        {
            return $this->belongsTo(Upload::class, 'featured_image', 'id');
        }

        public function toFilterableArray(): array
        {
            return [
                'category_id' => Category::getModel()->toOptions(value: 'name', emptyOption: 'Filtra per categoria...', enableEmptyOption: true),
            ];
        }
    }
