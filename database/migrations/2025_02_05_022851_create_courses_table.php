<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->string('instructor');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('difficulty_level_id');
            $table->integer('duration')->comment('Duration in minutes');
            $table->decimal('rating', 2, 1)->default(0);
            $table->unsignedBigInteger('format_id');
            $table->boolean('certification')->default(false);
            $table->date('release_date')->nullable();
            $table->unsignedBigInteger('popularity_status_id')->nullable();
            $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
