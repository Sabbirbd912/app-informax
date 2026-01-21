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
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Facebook, LinkedIn, Twitter
            $table->string('url');           // https://facebook.com/xxx
            $table->enum('icon_type', ['svg', 'emoji']);
            $table->text('icon_value');      // SVG code or emoji
            $table->string('theme_color')->default('green'); // green, teal, blue
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
        Schema::dropIfExists('social_links');
    }
};
