<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_contents', function (Blueprint $table) {
            $table->id();
            $table->integer("order_id");
            $table->foreign("order_id")->references("id")->on("orders")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->integer("product_id");
            $table->foreign("product_id")->references("id")->on("products")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->integer("count");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_contents');
    }
};
