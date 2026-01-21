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
        Schema::create('technology_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('technology_section_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('name');
            $table->string('emoji')->nullable();
            $table->string('border_color')->nullable(); // tailwind border class
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
        Schema::dropIfExists('technology_items');
    }
};
