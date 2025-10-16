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
        Schema::create('evaluacion_medicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("postulante_id");
            $table->double("nota", 8, 2)->nullable();
            $table->string("descripcion");
            $table->timestamps();

            $table->foreign("postulante_id")->on("postulantes")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacion_medicas');
    }
};
