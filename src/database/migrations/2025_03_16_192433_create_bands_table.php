<?php

use Illuminate\Database\Migrations\Migration;
use App\Overrides\Database\Blueprint;
use App\Overrides\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('country');
            $table->string('genre');
            $table->mediumText('discography');
            $table->text('lineup');
            $table->string('website')->nullable();
            $table->autoTimestamps();
        });

        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('band_id')->constrained('bands');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('format');
            $table->string('release_year');
            $table->string('label');
            $table->string('cover');
            $table->autoTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bands');
    }
};
