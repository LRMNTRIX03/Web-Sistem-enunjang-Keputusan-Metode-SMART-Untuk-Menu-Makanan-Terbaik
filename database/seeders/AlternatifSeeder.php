<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alternatif;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alternatif = [
            [
                "nama_alternatif" => "Alternatif 1",
            ],
             [
                "nama_alternatif" => "Alternatif 2",
            ],
             [
                "nama_alternatif" => "Alternatif 3",
            ],
             [
                "nama_alternatif" => "Alternatif 4",
            ],
             [
                "nama_alternatif" => "Alternatif 5",
            ],
             [
                "nama_alternatif" => "Alternatif 6",
            ],
             [
                "nama_alternatif" => "Alternatif 7",
            ],
             [
                "nama_alternatif" => "Alternatif 8",
            ],
             [
                "nama_alternatif" => "Alternatif 9",
            ],
             [
                "nama_alternatif" => "Alternatif 10",
            ]
            

        ];
        Alternatif::insert($alternatif);
    }
}
