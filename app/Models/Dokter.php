<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;

    protected $table = "dokter";

    public static function getDokter()
    {
        return Dokter::join('spesialis', 'spesialis.kd_sps', '=', 'dokter.kd_sps');
    }

    public static function findDokter($name)
    {
        return Dokter::join('spesialis', 'spesialis.kd_sps', '=', 'dokter.kd_sps')
            ->where('nm_dokter', 'like', '%' . $name . '%');
    }
}
