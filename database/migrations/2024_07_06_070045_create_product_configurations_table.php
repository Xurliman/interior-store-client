<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class);
            $table->string('data_mask');
            $table->string('data_object');
            $table->string('data_remove');
            $table->string('class');
            $table->string('extra_class')->nullable();
            $table->text('image_path');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_configurations');
    }
};
