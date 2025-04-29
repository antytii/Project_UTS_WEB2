<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;

    protected $fillable = ['asal', 'tujuan'];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
