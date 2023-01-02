<?php

    namespace Database\Seeders;

    // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use App\Models\Language;
    use App\Models\Post;
    use App\Models\Tag;
    use App\Models\Upload;
    use App\Models\User;
    use App\Services\PostService;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
            Language::factory()->create([
                'language_code' => 'it',
                'active' => true
            ]);
            User::factory()->create([
                'first_name' => 'Luca',
                'last_name' => 'Barbi',
                'email' => 'dev@coine.it',
                'password' => Hash::make('123trallalle'),
            ]);
            PostService::seed();
        }
    }
