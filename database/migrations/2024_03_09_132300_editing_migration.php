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
        Schema::create('editing', function (Blueprint $table) {
            $table->id('id_editing');
            $table->enum('tipe_editing',['foto','video']);
            $table->bigInteger('id_jasa')->unsigned();
            $table->timestamps();

            $table->foreign('id_jasa')->references('id_jasa')->on('jasa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editing');
    }
};
