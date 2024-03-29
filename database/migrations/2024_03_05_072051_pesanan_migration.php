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
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->bigInteger('id_jasa')->unsigned();
            $table->enum('status',['pending','proses','selesai','tidak selesai','ditolak'])->default('pending');
            $table->string('link_mentahan',200);
            $table->string('link_hasil',200)->nullable();
            $table->text('keterangan');
            $table->date('tenggat_pengerjaan');
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
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
