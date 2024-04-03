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
        Schema::create('nombre_medicament', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pharmacie_id'); 
            $table->bigInteger('medicament_id'); 
            $table->bigInteger('number'); 
            $table->timestamps();

            $table->foreign('pharmacie_id')->references('id')->on('pharmacie')->onDelete('cascade');    
            $table->foreign('medicament_id')->references('id')->on('medicament')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nombre_medicament');
    }
};
