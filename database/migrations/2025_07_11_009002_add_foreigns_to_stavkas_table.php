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
        Schema::table('stavkas', function (Blueprint $table) {
            $table
                ->foreign('rezervacija_id')
                ->references('id')
                ->on('rezervacijas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('jelo_id')
                ->references('id')
                ->on('jelos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stavkas', function (Blueprint $table) {
            $table->dropForeign(['rezervacija_id']);
            $table->dropForeign(['jelo_id']);
        });
    }
};
