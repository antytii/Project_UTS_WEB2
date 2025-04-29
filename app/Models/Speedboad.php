<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speedboad extends Model
{
    use HasFactory;

    protected $table = 'speedboads'; // Nama tabel
    protected $fillable = ['nama', 'kapasitas']; // Kolom yang boleh diisi massal

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
