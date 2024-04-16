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
        Schema::create('commande', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('medicament_id');
            $table->bigInteger('pharmacie_id');
            $table->bigInteger('requested_by');
            $table->bigInteger('number');
            $table->dateTime('dateDepart');
            $table->dateTime('dateArrive');
            $table->date('dateExpiration');
            $table->boolean('accepted')->default(false);
            $table->boolean('addedToStock')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('medicament_id')->references('id')->on('medicament')->onDelete('cascade');
            $table->foreign('pharmacie_id')->references('id')->on('pharmacie')->onDelete('cascade');
            $table->foreign('requested_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande');
    }
};
