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
        Schema::create('jasa', function (Blueprint $table) {
            $table->id('id_jasa');
            $table->char('pilihan_publikasi')->nullable();
            $table->char('catatan_redaktur')->nullable();
            $table->char('tag_sosmed')->nullable();
            $table->char('ringkasan_publikasi')->nullable();
            $table->boolean('pertanyaan_1')->nullable();
            $table->boolean('pertanyaan_2')->nullable();
            $table->boolean('pertanyaan_3')->nullable();
            $table->char('tipe_desain')->nullable();
            $table->char('ukuran_gambar')->nullable();
            $table->datetime('waktu_mulai')->nullable();
            $table->datetime('waktu_selesai')->nullable();
            $table->datetime('jadwal_foto')->nullable();
            $table->char('jenis_jasa')->nullable();
            $table->char('tema')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jasa');

    }
};
