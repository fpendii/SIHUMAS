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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->bigInteger('id_akun')->unsigned();
            $table->bigInteger('id_jasa')->unsigned();
            $table->enum('status',['pending','proses','belum-acc','redaktur','selesai','tidak selesai','ditolak'])->default('pending');
            $table->string('link_mentahan',200)->nullable();
            $table->string('ringkasan_publikasi',200)->nullable();
            $table->string('link_hasil',200)->nullable();
            $table->text('pesan');
            $table->date('tenggat_pengerjaan')->nullable();
            $table->char('unit',200)->nullable();
            $table->timestamps();

            $table->foreign('id_akun')->references('id_akun')->on('akun')->onDelete('cascade');
            $table->foreign('id_jasa')->references('id_jasa')->on('jasa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
