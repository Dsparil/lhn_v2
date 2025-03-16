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
        Schema::create('articles', function (Blueprint $table) {
            $table->unsignedId();
            $table->unsignedForeignId('category_id')->constrained('categories');
            $table->string('title');
            $table->longText('content');
            $table->string('slug')->unique();
            $table->boolean('is_draft')->default(false);
            $table->boolean('is_archived')->default(false);
            $table->string('author');
            $table->string('cover');
            $table->unsignedForeignId('created_by')->constrained('users');
            $table->unsignedForeignId('updated_by')->nullable()->constrained('users');
            $table->autoTimestamps();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->unsignedId();
            $table->unsignedForeignId('article_id')->constrained('articles');
            $table->unsignedForeignId('production_id')->constrained('productions');
            $table->unsignedTinyInteger('rating');
        });

        Schema::create('interviews', function (Blueprint $table) {
            $table->unsignedId();
            $table->unsignedForeignId('article_id')->constrained('articles');
            $table->unsignedForeignId('band_id')->constrained('bands');
            $table->mediumText('intro');
        });

        Schema::create('fanzines', function (Blueprint $table) {
            $table->unsignedId();
            $table->unsignedForeignId('article_id')->constrained('articles');
            $table->string('subtitle');
            $table->string('period');
            $table->string('description', 255);
            $table->string('contact');
            $table->string('email');
            $table->string('website');
        });

        Schema::create('livereports', function (Blueprint $table) {
            $table->unsignedId();
            $table->unsignedForeignId('article_id')->constrained('articles');
            $table->string('subtitle');
            $table->string('place');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livereports');
        Schema::dropIfExists('fanzines');
        Schema::dropIfExists('interviews');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('articles');
    }
};
