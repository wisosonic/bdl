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
        Schema::table('sponsors', function (Blueprint $table) {
            $table->dropColumn('platinum');
        });
        Schema::table('event_sponsor', function (Blueprint $table) {
            $table->integer("platinum");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sponsors', function (Blueprint $table) {
            $table->integer("platinum");
        });
        Schema::table('event_sponsor', function (Blueprint $table) {
            $table->dropColumn('platinum');
        });
    }
};
