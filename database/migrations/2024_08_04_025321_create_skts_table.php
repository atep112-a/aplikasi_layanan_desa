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
        Schema::create('skts', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemilik');
            $table->string('no_wa');
            $table->string('tanggal_kepemilikan')->nullable();
            $table->string('luas');
            $table->string('batas_utara');
            $table->string('batas_selatan');
            $table->string('batas_timur');
            $table->string('batas_barat');
            $table->string('jenis_tanah');
            $table->string('sertifikat');
            $table->string('no_sertifikat')->nullable();
            $table->string('dijaminkan');
            $table->text('ktp');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skts');
    }
};
