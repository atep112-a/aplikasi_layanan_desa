<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kronologi',
        'tanggal',
        'waktu',
        'tempat',
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
