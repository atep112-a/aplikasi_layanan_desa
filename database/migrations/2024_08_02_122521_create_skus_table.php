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
        Schema::create('skus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemilik_perusahaan');
            $table->string('no_wa');
            $table->string('nama_perusahaan');
            $table->string('bentuk_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('npwp')->nullable();
            $table->string('bidang_kegiatan_usaha');
            $table->string('jenis_barang_jasa_dagang_utama');
            $table->string('keadaan_saat_ini');
            $table->text('keterangan_tidak_lancar')->nullable();
            $table->string('ktp');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skus');
    }
};
