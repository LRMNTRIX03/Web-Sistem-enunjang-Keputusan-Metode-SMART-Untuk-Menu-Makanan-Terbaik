<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    protected $primaryKey = 'id_perhitungan';
    protected $table = 'perhitungan';
    protected $fillable = [
        'id_perhitungan',
        'awal_alternatif',
        'akhir_alternatif',
    ];
}
