<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_pelahir',
        'tanggal',
        'waktu',
        'tempat',
        'pembantu_lahir',
        'ktp',
        'kk',
        'status'
    ];

    // In Sktm.php model
public function user()
{
    return $this->belongsTo(User::class);
}

}
