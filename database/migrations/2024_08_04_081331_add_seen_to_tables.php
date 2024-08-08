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
        Schema::table('sktms', function (Blueprint $table) {
            $table->boolean('seen')->default(false);
        });
        Schema::table('sppts', function (Blueprint $table) {
            $table->boolean('seen')->default(false);
        });
        Schema::table('skts', function (Blueprint $table) {
            $table->boolean('seen')->default(false);
        });
        Schema::table('skus', function (Blueprint $table) {
            $table->boolean('seen')->default(false);
        });
        Schema::table('domisilis', function (Blueprint $table) {
            $table->boolean('seen')->default(false);
        });
        Schema::table('kelahirans', function (Blueprint $table) {
            $table->boolean('seen')->default(false);
        });
        Schema::table('kematians', function (Blueprint $table) {
            $table->boolean('seen')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sktms', function (Blueprint $table) {
            $table->dropColumn('seen');
        });
        Schema::table('sppts', function (Blueprint $table) {
            $table->dropColumn('seen');
        });

        Schema::table('skts', function (Blueprint $table) {
            $table->dropColumn('seen');
        });
        Schema::table('skus', function (Blueprint $table) {
            $table->dropColumn('seen');
        });
        Schema::table('domisilis', function (Blueprint $table) {
            $table->dropColumn('seen');
        });
        Schema::table('kelahirans', function (Blueprint $table) {
            $table->dropColumn('seen');
        });
        Schema::table('kematians', function (Blueprint $table) {
            $table->dropColumn('seen');
        });
    }
};
