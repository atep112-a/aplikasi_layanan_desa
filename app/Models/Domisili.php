<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domisili extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'no_wa',
        'ttl',
        'jk',
        'agama',
        'pekerjaan',
        'alamat',
        'kegunaan',
        'tujuan_pembuatan',
        'ktp',
        'status'
    ];
}
