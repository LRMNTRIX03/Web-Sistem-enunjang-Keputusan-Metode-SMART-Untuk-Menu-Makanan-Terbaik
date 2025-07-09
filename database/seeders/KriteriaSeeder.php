<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_kriteria' => 'kalori', 'bobot' => 60, 'attribut' => 'benefit'],
            ['nama_kriteria' => 'protein', 'bobot' => 10, 'attribut' => 'benefit'],
            ['nama_kriteria' => 'lemak', 'bobot' => 10, 'attribut' => 'cost'],
            ['nama_kriteria' => 'karbohidrat', 'bobot' => 20, 'attribut' => 'benefit'],
        ];

        DB::table('kriteria')->insert($data);
    }
}
