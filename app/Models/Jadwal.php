<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = "jadwal";

    public static function getJadwal($name)
    {
        return Jadwal::join('dokter', 'jadwal.kd_dokter', '=', 'dokter.kd_dokter')
            ->join('poliklinik', 'jadwal.kd_poli', '=', 'poliklinik.kd_poli')
            ->where('dokter.nm_dokter', 'like', '%' . $name . '%')->get();
    }
}
