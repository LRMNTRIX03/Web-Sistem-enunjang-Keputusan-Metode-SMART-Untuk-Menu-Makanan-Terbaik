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
    Schema::create('detail_perhitungan', function (Blueprint $table) {
    $table->id();
    $table->integer('id_perhitungan');
    $table->integer('id_alternatif');
    $table->float('kalori')->nullable();
    $table->float('protein')->nullable();
    $table->float('lemak')->nullable();
    $table->float('karbohidrat')->nullable();
    $table->float('nilai_akhir')->nullable(); 
    $table->timestamps();

    $table->foreign('id_perhitungan')->references('id_perhitungan')->on('perhitungan')->onDelete('cascade');
    $table->foreign('id_alternatif')->references('id_alternatif')->on('alternatif')->onDelete('cascade');
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_perhitungans');
    }
};
