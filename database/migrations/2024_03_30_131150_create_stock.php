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
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('medicament_id');
            $table->bigInteger('pharmacie_id');
            $table->bigInteger('number');
            $table->date('dateFabrication');
            $table->date('dateExpiration');
            $table->bigInteger('price');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('medicament_id')->references('id')->on('medicament')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};
