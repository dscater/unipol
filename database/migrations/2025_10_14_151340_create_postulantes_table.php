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
        Schema::create('postulantes', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 255);
            $table->string("paterno", 255);
            $table->string("materno", 255)->nullable();
            $table->string("ci", 255);
            $table->string("ci_exp", 255);
            $table->string("complemento")->nullable();
            $table->string("genero", 10);
            $table->string("unidad");
            $table->date("fecha_nac");
            $table->string("cel");
            $table->string("correo", 255);
            $table->string("nro_cuenta", 255);
            $table->string("lugar_preins", 255);
            $table->string("observacion", 1000)->nullable();
            $table->string("estado"); // PREINSCRITO | INSCRITO
            $table->string("foto", 255)->nullable();
            $table->unsignedBigInteger("user_id");
            $table->date("fecha_registro");
            $table->bigInteger("nro_insc");
            $table->string("codigo", 255)->unique();
            $table->integer("status")->default(1);
            $table->timestamps();

            $table->foreign("user_id")->on("users")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulantes');
    }
};
