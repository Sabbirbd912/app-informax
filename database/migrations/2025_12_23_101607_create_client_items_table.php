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
        Schema::create('client_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('client_section_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');                 // Enterprise Client 1
            $table->enum('icon_type', ['emoji', 'svg', 'image']);
            $table->text('icon_value');             // 🏢 OR svg OR image path
            $table->string('theme_color')->nullable(); // green, teal, blue, orange
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
        Schema::dropIfExists('client_items');
    }
};
