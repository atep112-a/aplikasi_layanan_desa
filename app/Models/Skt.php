<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skt extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemilik',
        'no_wa',
        'tanggal_kepemilikan',
        'luas',
        'batas_utara',
        'batas_selatan',
        'batas_timur',
        'batas_barat',
        'jenis_tanah',
        'sertifikat',
        'no_sertifikat',
        'dijaminkan',
        'ktp',
        'status'
    ];
}
