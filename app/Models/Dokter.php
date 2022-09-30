<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;

    protected $table = "dokter";

    public static function getJadwal($name)
    {
        return Dokter::join('jadwal', 'jadwal.kd_dokter', '=', 'dokter.kd_dokter')->where('dokter.nm_dokter', 'like', '%' . $name . '%')->get();
    }
}
