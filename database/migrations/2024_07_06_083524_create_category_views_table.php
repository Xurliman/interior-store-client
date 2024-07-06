<?php

use App\Models\Category;
use App\Models\View;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_views', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(View::class);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_views');
    }
};
