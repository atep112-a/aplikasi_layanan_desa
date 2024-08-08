<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sktm extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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
