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
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->string('image')->default("");
            $table->text('descripcion');
            $table->integer('habitaciones')->default(0);
            $table->integer('estacionamiento')->default(0);
            $table->integer('WC')->default(0);
            $table->string('calle', 60);
            $table->string('lat');
            $table->string('lng');
            $table->boolean('publicado')->default(1);
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('precio_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmuebles');
    }
};
