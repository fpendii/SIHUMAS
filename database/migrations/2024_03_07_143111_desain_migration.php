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
        Schema::create('desain', function (Blueprint $table) {
            $table->id('id_desain');
            $table->bigInteger('id_jasa')->unsigned();
            $table->bigInteger('id_pesanan')->unsigned(); 
            $table->string('tipe_desain');
            $table->string('ukuran_gambar');  
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
        Schema::dropIfExists('desain');
    }
};
