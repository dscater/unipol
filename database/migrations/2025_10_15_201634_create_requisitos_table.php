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
        Schema::create('requisitos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("postulante_id");
            $table->unsignedBigInteger("user_id");
            $table->string("file1")->nullable();
            $table->string("file2")->nullable();
            $table->string("file3")->nullable();
            $table->string("file4")->nullable();
            $table->string("file5")->nullable();
            $table->string("file6")->nullable();
            $table->string("file7")->nullable();
            $table->string("file8")->nullable();
            $table->string("file9")->nullable();
            $table->string("file10")->nullable();
            $table->string("file11")->nullable();
            $table->string("file12")->nullable();
            $table->string("file13")->nullable();
            $table->string("file14")->nullable();
            $table->integer("edad")->nullable();
            $table->timestamps();

            $table->foreign("postulante_id")->on("postulantes")->references("id");
            $table->foreign("user_id")->on("users")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitos');
    }
};
