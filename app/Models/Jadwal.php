<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rute;
use App\Models\Speedboad;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';

    protected $fillable = [
        'nama_speedboat', // ini opsional, nanti kalau sudah pakai speedboad_id bisa dihapus
        'tanggal',
        'waktu',
        'tujuan',
        'kapasitas',
        'rute_id', // tetap ada
        'speedboad_id', // ✅ tambahkan untuk relasi ke speedboad
    ];

    // Relasi: Jadwal dimiliki oleh satu Rute
    public function rute()
    {
        return $this->belongsTo(Rute::class);
    }

    // Relasi: Jadwal dimiliki oleh satu Speedboad
    public function speedboad()
    {
        return $this->belongsTo(Speedboad::class);
    }
}
