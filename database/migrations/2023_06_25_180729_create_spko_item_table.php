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
        Schema::create('spko_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ordinal');
            $table->foreign('ordinal')->references('id_spko')->on('spko')->onDelete('restrict');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id_product')->on('product')->onDelete('restrict');
            $table->unsignedInteger('qty')->length(11);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spko_item');
    }
};
