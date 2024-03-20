<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjadwalan extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'asisten_1_id',
        'asisten_2_id',
        'jam_mulai',
        'jam_berakhir',
        'hari',
        'kelas_id',
        'mata_praktikum_id',
        'ruangan_id',
        'periode_id',
        'is_active',
    ];

    public function asisten()
    {
        return $this->belongsTo(Asisten::class, 'asisten_1_id', 'user_id');
    }

    public function asisten2()
    {
        return $this->belongsTo(Asisten::class, 'asisten_2_id', 'user_id');
    }

    public function mata_praktikum()
    {
        return $this->belongsTo(MataPraktikum::class, 'mata_praktikum_id', 'id');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id', 'id');
    }
}
