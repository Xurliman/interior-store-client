<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('content_updates', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->enum('status', ['successful', 'failed'])->default('failed');
            $table->string('version')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('update_installed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_updates');
    }
};
