<?php

    namespace App\Traits;

    use Str;

    trait ValidateSlug
    {
        public static function validateSlug(string $slug): string
        {
            $slug = Str::slug($slug);

            $validated = $slug;

            while (self::whereSlug($validated)->count() > 0) {
                static $i = 1;
                $validated = "$slug-$i";
            }
            return $validated;
        }
    }
