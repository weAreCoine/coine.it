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
            Schema::create('uploads', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('file_name')->unique();
                $table->string('url')->unique();
                $table->string('alt')->nullable();
                $table->text('description')->nullable();
                $table->integer('width')->nullable();
                $table->integer('height')->nullable();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('uploads');
        }
    };
