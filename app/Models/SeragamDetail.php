<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeragamDetail extends Model
{
    use HasFactory;
    protected $table = 'seragam_detail';
    protected $fillable = [
        'seragam_id', 'ukuran', 'stok', 'harga'
    ];

    public function seragam()
    {
        return $this->belongsTo(Seragam::class);
    }
}
