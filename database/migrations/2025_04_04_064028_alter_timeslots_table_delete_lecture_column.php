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
        Schema::table('timeslots', function (Blueprint $table) {
            // $table->dropForeign(['lecture_id']);
            $table->dropColumn('lecture_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('timeslots', function (Blueprint $table) {
            $table->integer('lecture_id');
            // $table->foreignId('lecture_id')
            //     ->nullable()
            //     ->constrained(table: 'lectures')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
        });
    }
};
