<?php

namespace App\Traits;

use Str;

trait ValidateSlug
{
    public static function validateSlug(string $slug): string
    {
        $slug = Str::slug($slug);

        $validated = $slug;

        while (self::whereSlug($validated)->exists()) {
            static $i = 1;
            $validated = "$slug-$i";
        }

        return $validated;
    }
}
