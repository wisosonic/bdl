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
            $table->integer('event_id');
            // $table->foreignId('event_id')
            //     ->nullable()
            //     ->constrained(table: 'events')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('timeslots', function (Blueprint $table) {
            // $table->dropForeign(['event_id']);
            $table->dropColumn('event_id');
        });
    }
};
