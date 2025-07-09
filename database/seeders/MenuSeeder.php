<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            // Alternatif 1
            ["id_alternatif" => 1, "nama_menu" => "Nasi Merah (100 gr)", "kalori" => 110, "protein" => 2.3, "lemak" => 0.9, "karbohidrat" => 23],
            ["id_alternatif" => 1, "nama_menu" => "Daging Sapi Teriyaki (50 gr)", "kalori" => 110, "protein" => 10, "lemak" => 8, "karbohidrat" => 2],
            ["id_alternatif" => 1, "nama_menu" => "Orek Tempe (50 gr)", "kalori" => 95, "protein" => 5, "lemak" => 5, "karbohidrat" => 6],
            ["id_alternatif" => 1, "nama_menu" => "Toge Kuah Bening", "kalori" => 25, "protein" => 1, "lemak" => 0.2, "karbohidrat" => 3],
            ["id_alternatif" => 1, "nama_menu" => "Papaya (100 gr)", "kalori" => 39, "protein" => 0.5, "lemak" => 0.1, "karbohidrat" => 10],

            // Alternatif 2
            ["id_alternatif" => 2, "nama_menu" => "Nasi Putih (100 gr)", "kalori" => 175, "protein" => 3.2, "lemak" => 0.3, "karbohidrat" => 39],
            ["id_alternatif" => 2, "nama_menu" => "Dada Ayam Panggang (50 gr)", "kalori" => 82, "protein" => 15.5, "lemak" => 1.8, "karbohidrat" => 0],
            ["id_alternatif" => 2, "nama_menu" => "Pepes Tahu (50 gr)", "kalori" => 70, "protein" => 4, "lemak" => 4, "karbohidrat" => 3],
            ["id_alternatif" => 2, "nama_menu" => "Bayam Kuah Bening", "kalori" => 23, "protein" => 2, "lemak" => 0.3, "karbohidrat" => 3.9],
            ["id_alternatif" => 2, "nama_menu" => "Jeruk (100 gr)", "kalori" => 47, "protein" => 0.9, "lemak" => 0.1, "karbohidrat" => 11.8],

            // Alternatif 3
            ["id_alternatif" => 3, "nama_menu" => "Nasi Merah (100 gr)", "kalori" => 110, "protein" => 2.3, "lemak" => 0.9, "karbohidrat" => 23],
            ["id_alternatif" => 3, "nama_menu" => "Ikan Panggang (50 gr)", "kalori" => 85, "protein" => 10, "lemak" => 3, "karbohidrat" => 0],
            ["id_alternatif" => 3, "nama_menu" => "Tempe Goreng Kering (50 gr)", "kalori" => 150, "protein" => 7, "lemak" => 9, "karbohidrat" => 8],
            ["id_alternatif" => 3, "nama_menu" => "Tumis Capcay", "kalori" => 90, "protein" => 3, "lemak" => 5, "karbohidrat" => 10],
            ["id_alternatif" => 3, "nama_menu" => "Manggis (100 gr)", "kalori" => 73, "protein" => 0.8, "lemak" => 0.6, "karbohidrat" => 18],

            // Alternatif 4
            ["id_alternatif" => 4, "nama_menu" => "Nasi Putih (100 gr)", "kalori" => 175, "protein" => 3.2, "lemak" => 0.3, "karbohidrat" => 39],
            ["id_alternatif" => 4, "nama_menu" => "Telur orak-arik (50 gr)", "kalori" => 70, "protein" => 6, "lemak" => 5, "karbohidrat" => 1],
            ["id_alternatif" => 4, "nama_menu" => "Bakso Tempe Rebus (50 gr)", "kalori" => 80, "protein" => 5, "lemak" => 4, "karbohidrat" => 6],
            ["id_alternatif" => 4, "nama_menu" => "Sayur Sop", "kalori" => 70, "protein" => 2, "lemak" => 4, "karbohidrat" => 10],
            ["id_alternatif" => 4, "nama_menu" => "Pir (100 gr)", "kalori" => 57, "protein" => 0.4, "lemak" => 0.2, "karbohidrat" => 15],

            // Alternatif 5
            ["id_alternatif" => 5, "nama_menu" => "Nasi Merah (100 gr)", "kalori" => 110, "protein" => 2.3, "lemak" => 0.9, "karbohidrat" => 23],
            ["id_alternatif" => 5, "nama_menu" => "Ayam Saus Tiram (50 gr)", "kalori" => 70, "protein" => 7, "lemak" => 4, "karbohidrat" => 2],
            ["id_alternatif" => 5, "nama_menu" => "Perkedel Tahu Panggang (50 gr)", "kalori" => 90, "protein" => 5, "lemak" => 4, "karbohidrat" => 8],
            ["id_alternatif" => 5, "nama_menu" => "Tumis Buncis", "kalori" => 55, "protein" => 2, "lemak" => 3, "karbohidrat" => 9],
            ["id_alternatif" => 5, "nama_menu" => "Melon (100 gr)", "kalori" => 34, "protein" => 0.8, "lemak" => 0.2, "karbohidrat" => 8],

            // Alternatif 6
            ["id_alternatif" => 6, "nama_menu" => "Nasi Putih (100 gr)", "kalori" => 175, "protein" => 3.2, "lemak" => 0.3, "karbohidrat" => 39],
            ["id_alternatif" => 6, "nama_menu" => "Ikan Goreng Tanpa Tepung (50 gr)", "kalori" => 90, "protein" => 10, "lemak" => 5, "karbohidrat" => 0],
            ["id_alternatif" => 6, "nama_menu" => "Nugget Tempe Panggang (50 gr)", "kalori" => 90, "protein" => 6, "lemak" => 4, "karbohidrat" => 8],
            ["id_alternatif" => 6, "nama_menu" => "Sayur Asam", "kalori" => 50, "protein" => 2, "lemak" => 1, "karbohidrat" => 12],
            ["id_alternatif" => 6, "nama_menu" => "Kelengkeng (100 gr)", "kalori" => 60, "protein" => 0.9, "lemak" => 0.1, "karbohidrat" => 15],

            // Alternatif 7
            ["id_alternatif" => 7, "nama_menu" => "Nasi Merah (100 gr)", "kalori" => 110, "protein" => 2.3, "lemak" => 0.9, "karbohidrat" => 23],
            ["id_alternatif" => 7, "nama_menu" => "Telur Rebus (50 gr)", "kalori" => 70, "protein" => 6, "lemak" => 5, "karbohidrat" => 0.6],
            ["id_alternatif" => 7, "nama_menu" => "Bacem Tempe (50 gr)", "kalori" => 90, "protein" => 5, "lemak" => 4, "karbohidrat" => 8],
            ["id_alternatif" => 7, "nama_menu" => "Oseng Sawi", "kalori" => 40, "protein" => 2, "lemak" => 2, "karbohidrat" => 7],
            ["id_alternatif" => 7, "nama_menu" => "Mangga (100 gr)", "kalori" => 60, "protein" => 0.8, "lemak" => 0.4, "karbohidrat" => 15],

            // Alternatif 8
            ["id_alternatif" => 8, "nama_menu" => "Nasi Putih (100 gr)", "kalori" => 175, "protein" => 3.2, "lemak" => 0.3, "karbohidrat" => 39],
            ["id_alternatif" => 8, "nama_menu" => "Bistik Telur Puyuh (50 gr)", "kalori" => 70, "protein" => 6, "lemak" => 5, "karbohidrat" => 1],
            ["id_alternatif" => 8, "nama_menu" => "Bacem Tahu (50 gr)", "kalori" => 90, "protein" => 5, "lemak" => 4, "karbohidrat" => 8],
            ["id_alternatif" => 8, "nama_menu" => "Tumis Kangkung", "kalori" => 35, "protein" => 3, "lemak" => 2, "karbohidrat" => 7],
            ["id_alternatif" => 8, "nama_menu" => "Kiwi (100 gr)", "kalori" => 61, "protein" => 1.1, "lemak" => 0.5, "karbohidrat" => 14.7],

            // Alternatif 9
            ["id_alternatif" => 9, "nama_menu" => "Nasi Merah (100 gr)", "kalori" => 110, "protein" => 2.3, "lemak" => 0.9, "karbohidrat" => 23],
            ["id_alternatif" => 9, "nama_menu" => "Udang Saus Padang (50 gr)", "kalori" => 70, "protein" => 8, "lemak" => 3, "karbohidrat" => 2],
            ["id_alternatif" => 9, "nama_menu" => "Botok Tempe (50 gr)", "kalori" => 80, "protein" => 4, "lemak" => 5, "karbohidrat" => 4],
            ["id_alternatif" => 9, "nama_menu" => "Tumis Buncis", "kalori" => 35, "protein" => 1, "lemak" => 2, "karbohidrat" => 4],
            ["id_alternatif" => 9, "nama_menu" => "Apel (100 gr)", "kalori" => 52, "protein" => 0.3, "lemak" => 0.2, "karbohidrat" => 14],

            // Alternatif 10
            ["id_alternatif" => 10, "nama_menu" => "Nasi Putih (100 gr)", "kalori" => 175, "protein" => 3.2, "lemak" => 0.3, "karbohidrat" => 39],
            ["id_alternatif" => 10, "nama_menu" => "Ikan Salmon Rebus (50 gr)", "kalori" => 100, "protein" => 10, "lemak" => 6, "karbohidrat" => 0],
            ["id_alternatif" => 10, "nama_menu" => "Tahu Panggang (50 gr)", "kalori" => 70, "protein" => 6, "lemak" => 4, "karbohidrat" => 1],
            ["id_alternatif" => 10, "nama_menu" => "Labu Siam Kuah Bening", "kalori" => 20, "protein" => 1, "lemak" => 1, "karbohidrat" => 4],
            ["id_alternatif" => 10, "nama_menu" => "Semangka (100 gr)", "kalori" => 30, "protein" => 0.6, "lemak" => 0.2, "karbohidrat" => 7.6],
        ];

        DB::table('menu')->insert($menus);
    }
}
