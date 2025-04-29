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
        Schema::table('lectures', function (Blueprint $table) {
            $table->integer('timeslot_id');
            // $table->foreignId('timeslot_id')
            //     ->nullable()
            //     ->constrained(table: 'timeslots')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lectures', function (Blueprint $table) {
            // $table->dropForeign(['timeslot_id']);
            $table->dropColumn('timeslot_id');
        });
    }
};
