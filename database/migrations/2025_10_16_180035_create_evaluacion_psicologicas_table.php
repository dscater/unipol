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
        Schema::create('evaluacion_psicologicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("postulante_id");
            $table->string("valoracion", 255);
            $table->string("nro_baucher", 255);
            $table->string("nro_folder", 255);
            $table->timestamps();

            $table->foreign("postulante_id")->on("postulantes")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacion_psicologicas');
    }
};
