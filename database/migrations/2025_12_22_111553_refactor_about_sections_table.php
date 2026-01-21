<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Remove the old table
        Schema::dropIfExists('about_sections');

        // 2. Create the new parent table
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('main_title');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 3. Create the new child table
        Schema::create('about_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_section_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('content');
            $table->string('icon')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_cards');
        Schema::dropIfExists('about_sections');
    }
};
