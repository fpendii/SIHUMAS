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
        Schema::create('peliputan', function (Blueprint $table) {
            $table->id('id_peliputan');
            $table->bigInteger('id_jasa')->unsigned();
            $table->dateTime('jadwal_mulai');
            $table->dateTime('jadwal_selesai');
            $table->text('pertanyaan_1');
            $table->text('pertanyaan_2');
            $table->text('pertanyaan_3');
            $table->timestamps();

            $table->foreign('id_jasa')->references('id_jasa')->on('jasa')->onDelete('cascade');

            $table->bigInteger('id_pesanan')->unsigned();  
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliputan');
    }
};
