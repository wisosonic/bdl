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
        Schema::table('registrations', function (Blueprint $table) {
            $table->string("lda_id")->nullable()->change();
            $table->string("location")->nullable()->change();
            $table->integer("doctor")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->string("lda_id")->change();
            $table->string("location")->change();
            $table->dropColumn('doctor');
        });
    }
};
