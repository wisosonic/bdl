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
        Schema::dropIfExists('event_timeslot');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('event_timeslot', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id');
            // $table->foreignId('event_id')
            //     ->nullable()
            //     ->constrained(table: 'events')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            $table->integer('timeslot_id');
            // $table->foreignId('timeslot_id')
            //     ->nullable()
            //     ->constrained(table: 'timeslots')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            $table->timestamps();
        });
    }
};
