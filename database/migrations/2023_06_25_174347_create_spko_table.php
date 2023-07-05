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
        Schema::create('spko', function (Blueprint $table) {
            $table->id('id_spko');
            $table->text('remarks');
            $table->unsignedBigInteger('employee');
            $table->foreign('employee')->references('id_employee')->on('employee')->onDelete('restrict');
            $table->date('trans_date');
            $table->string('process', 10);
            $table->string('sw', 25);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spko');
    }
};
