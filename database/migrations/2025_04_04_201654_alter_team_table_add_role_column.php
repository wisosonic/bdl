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
        Schema::table('team', function (Blueprint $table) {
            $table->string("professor");
            $table->string("position");
            $table->string("photo");
            $table->string("x");
            $table->string("facebook");
            $table->string("instagram");
            $table->string("linkedin");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team', function (Blueprint $table) {
            $table->dropColumn('professor');
            $table->dropColumn('position');
            $table->dropColumn('photo');
            $table->dropColumn('x');
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
            $table->dropColumn('linkedin');
        });
    }
};
