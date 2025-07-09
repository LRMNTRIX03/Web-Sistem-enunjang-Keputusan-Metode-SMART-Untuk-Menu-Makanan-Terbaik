<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = 'Alternatif';
    protected $primaryKey = 'id_alternatif';
    protected $fillable = ['id_alternatif', 'nama_alternatif'];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'id_alternatif');
    }
}
