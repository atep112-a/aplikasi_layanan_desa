<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('domisilis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('no_wa');
            $table->string('ttl');
            $table->string('jk');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('kegunaan');
            $table->string('tujuan_pembuatan');
            $table->string('ktp')->nullable();
            $table->string('status')->default('Proses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domisilis');
    }
};
