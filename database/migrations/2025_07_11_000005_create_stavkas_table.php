<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stavkas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('trenutna_cena');
            $table->integer('kolicina');
            $table->unsignedBigInteger('rezervacija_id');
            $table->unsignedBigInteger('jelo_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stavkas');
    }
};
