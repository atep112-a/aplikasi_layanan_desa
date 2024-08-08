<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sppt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'batas_utara',
        'batas_selatan',
        'batas_timur',
        'batas_barat',
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
