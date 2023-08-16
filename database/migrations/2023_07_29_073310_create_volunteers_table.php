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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('phone_number');
            $table->string('email');
            $table->text('address');
            $table->enum('volunteered_before', [1,0]);
            $table->text('volunteered_details')->nullable();
            $table->enum('skills', [1,0]);
            $table->text('skills_details')->nullable();
            $table->date('volunteered_start');
            $table->date('volunteered_end');
            $table->text('study_experience');
            $table->string('resume');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
