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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('short_description_ar');
            $table->string('short_description_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->string('slug')->unique();
            $table->enum('status', ['active', 'unactive'])->default('active');
            $table->bigInteger('visited_count')->default(0);
            // $table->string('instagram_link');
            // $table->string('twitter_link');
            $table->text('keywords_ar');
            $table->text('keywords_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
