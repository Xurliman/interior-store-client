<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->text('path');
            $table->enum('type', ['black_bg', 'black_white', 'transparent_bg', 'mask_bg'])->nullable();
            $table->integer('imageable_id');
            $table->text('imageable_type');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
