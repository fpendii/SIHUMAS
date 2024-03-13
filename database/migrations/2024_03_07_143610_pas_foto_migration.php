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
        Schema::create('pas_foto', function (Blueprint $table) {
            $table->id('id_foto');
            $table->bigInteger('id_jasa')->unsigned();
            $table->dateTime('jadwal_foto');
            $table->timestamps();

            $table->foreign('id_jasa')->references('id_jasa')->on('jasa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pas_foto');
    }
};
