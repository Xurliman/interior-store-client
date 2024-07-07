<?php

use App\Models\View;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('view_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(View::class);
            $table->string('div_class');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('view_items');
    }
};
