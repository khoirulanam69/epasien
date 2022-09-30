<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = "kamar";

    public static function getRoom($name)
    {
        return Kamar::where('kd_kamar', 'like', '%' . $name . '%')->get();
    }
}
