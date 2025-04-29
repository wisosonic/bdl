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
        Schema::table('users', function (Blueprint $table) {
            $table->string("phone")->after('email');
            $table->string("lda_id")->nullable()->after('phone');
            $table->string("location")->after('lda_id');
            $table->string("doctor")->after('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('location');
            $table->dropColumn('lda_id');
            $table->dropColumn('phone');
            $table->dropColumn('doctor');
        });
    }
};
