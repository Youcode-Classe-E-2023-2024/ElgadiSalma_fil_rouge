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
            $table->bigInteger('initialNumber');
            $table->bigInteger('number');
            $table->boolean('finished')->default(false);
            $table->bigInteger('price');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('medicament_id')->references('id')->on('medicament')->onDelete('cascade');
            $table->foreign('pharmacie_id')->references('id')->on('pharmacie')->onDelete('cascade');

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
