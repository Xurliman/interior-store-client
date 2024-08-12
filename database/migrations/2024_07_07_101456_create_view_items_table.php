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
        Schema::create('view_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(View::class);
            $table->foreignIdFor(Category::class);
            $table->decimal('width')->default(0);
            $table->decimal('height')->default(0);
            $table->decimal('bottom')->nullable();
            $table->decimal('top')->nullable();
            $table->decimal('right')->nullable();
            $table->decimal('left')->nullable();
            $table->string('div_class');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('view_items');
    }
};
