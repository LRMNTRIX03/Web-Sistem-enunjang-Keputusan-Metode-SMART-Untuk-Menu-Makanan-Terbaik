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
        Schema::create('perhitungan', function (Blueprint $table) {
            $table->integer('id_perhitungan')->autoIncrement()->primary();
            $table->Integer('awal_alternatif')->nullable();
            $table->integer('akhir_alternatif')->nullable();
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perhitungan');
    }
};
