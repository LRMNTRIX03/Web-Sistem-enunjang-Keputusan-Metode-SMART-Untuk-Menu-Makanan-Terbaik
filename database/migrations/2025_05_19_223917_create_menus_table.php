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
Schema::create('menu', function (Blueprint $table) {
        $table->id('id_menu'); // id_menu auto increment primary key
        $table->integer('id_alternatif');
        $table->string('nama_menu')->nullable();
        $table->float('kalori')->nullable();
        $table->float('protein')->nullable();
        $table->float('lemak')->nullable();
        $table->float('karbohidrat')->nullable();
        $table->timestamps();

        $table->foreign('id_alternatif')->references('id_alternatif')->on('alternatif')->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
