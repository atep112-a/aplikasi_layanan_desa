<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemilik_perusahaan',
        'no_wa',
        'nama_perusahaan',
        'bentuk_perusahaan',
        'alamat_perusahaan',
        'npwp',
        'bidang_kegiatan_usaha',
        'jenis_barang_jasa_dagang_utama',
        'keadaan_saat_ini',
        'keterangan_tidak_lancar',
        'ktp',
        'status',
    ];

}
