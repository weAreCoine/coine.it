<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->timestamps();

                $table->enum('status', ['draft', 'private', 'publish'])->default('draft');
                $table->boolean('trashed')->default(false);

                $table->string('title');
                $table->string('slug')->unique();
                $table->foreignId('featured_image')->nullable()->constrained('uploads')->cascadeOnUpdate();
                $table->foreignId('language_id')->default(1)->constrained('languages')->cascadeOnUpdate();
                $table->boolean('cornerstone_content')->default(false);
                $table->string('description')->nullable();
                $table->longText('content')->nullable();
                $table->string('seo_title')->nullable();
                $table->string('seo_description')->nullable();

                $table->foreignId('category_id')
                    ->nullable()
                    ->constrained('categories')
                    ->cascadeOnUpdate();
                $table->foreignId('user_id')
                    ->nullable()
                    ->constrained('users')
                    ->cascadeOnUpdate()
                    ->cascadeOnDelete();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('posts');
        }
    };
