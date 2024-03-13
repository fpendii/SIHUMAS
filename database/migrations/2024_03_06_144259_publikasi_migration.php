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
        Schema::create('publikasi', function (Blueprint $table) {
            $table->id('id_publikasi');
            $table->bigInteger('id_jasa')->unsigned();
            $table->bigInteger('id_pesanan')->unsigned();  
            $table->char('pilihan_publikasi');
            $table->char('catatan_redaktur');
            $table->text('tag_sosmed');
            $table->text('link_ringkasan_publikasi');

            $table->timestamps();

            $table->foreign('id_jasa')->references('id_jasa')->on('jasa')->onDelete('cascade');
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publikasi');
    }
};
