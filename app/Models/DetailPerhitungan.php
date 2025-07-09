<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPerhitungan extends Model
{
    protected $table = "detail_perhitungan";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_perhitungan',
        'id_alternatif',
        'kalori',
        'protein',
        'lemak',
        'karbohidrat',
        'nilai_akhir',
    ];

    public function perhitungan()
    {
        return $this->belongsTo(Perhitungan::class, 'id_perhitungan');
    }
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'id_alternatif');
    }
}
