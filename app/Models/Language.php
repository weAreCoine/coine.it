<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Language extends Model
    {
        use HasFactory;

        public $timestamps = false;

        public static function getTitle(string $languageCode)
        {
            return match ($languageCode) {
                'en' => 'English',
                default => 'Italiano',
            };
        }
    }
