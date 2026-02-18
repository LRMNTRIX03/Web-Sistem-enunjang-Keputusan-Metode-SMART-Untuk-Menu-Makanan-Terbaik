# Sistem Pendukung Keputusan (SPK) Pemilihan Menu Makanan Terbaik – Metode SMART

Proyek ini merupakan aplikasi **Sistem Pendukung Keputusan (SPK)** untuk membantu menentukan **menu makanan terbaik** menggunakan metode **SMART (Simple Multi Attribute Rating Technique)**. Sistem dirancang untuk mempermudah proses penilaian dan pemilihan alternatif menu berdasarkan berbagai kriteria yang dapat disesuaikan.

Aplikasi ini cocok digunakan untuk kebutuhan restoran, katering, maupun studi akademik yang membutuhkan proses pengambilan keputusan multikriteria secara terstruktur dan objektif.

## Fitur Utama

* **Otentikasi Pengguna**

  * Login & logout
  * Keamanan data pengelolaan SPK

* **Manajemen Kriteria**

  * Tambah, ubah, hapus kriteria penilaian
  * Pengaturan bobot tiap kriteria
  * Tipe kriteria (benefit / cost)

* **Manajemen Alternatif Menu**

  * Input data alternatif menu makanan
  * Kelola nilai alternatif terhadap setiap kriteria
  * Relasi alternatif dengan kriteria

* **Perhitungan Metode SMART**

  * Normalisasi bobot kriteria
  * Perhitungan nilai utilitas
  * Perankingan otomatis alternatif
  * Proses transparan dan terstruktur

* **Hasil Perhitungan**

  * Tampilan ranking menu terbaik
  * Detail skor setiap alternatif
  * Ringkasan hasil keputusan

* **Export PDF**

  * Export laporan hasil perhitungan
  * Siap cetak
  * Cocok untuk dokumentasi & pelaporan

## Metode yang Digunakan

Metode **SMART (Simple Multi Attribute Rating Technique)** digunakan untuk:

* Mengubah bobot kriteria menjadi bobot ternormalisasi
* Menghitung nilai utilitas tiap alternatif
* Menentukan skor akhir berdasarkan penjumlahan terbobot
* Menghasilkan ranking menu terbaik

## Tujuan Proyek

* Membantu pengambilan keputusan pemilihan menu makanan terbaik
* Mengurangi subjektivitas dalam penilaian
* Menyediakan sistem perhitungan yang konsisten dan dapat dipertanggungjawabkan
* Menjadi contoh implementasi SPK metode SMART dalam aplikasi nyata

## Cara Penggunaan
**1. Clone project**
```bash
git clone https://github.com/LRMNTRIX03/Web-Sistem-enunjang-Keputusan-Metode-SMART-Untuk-Menu-Makanan-Terbaik
cd Web-Sistem-Penunjang-Keputusan-Metode-SMART-Untuk-Menu-Makanan-Terbaik
```
**2. Copy env**
```bash
copy .env.example .env
```
**3. Install Composer**
```bash
composer install
```
**4. Generate key**
```bash
php artisan key:generate
```
**5. Setup konfigurasi database**
```php
DB_CONNECTION=mysql
DB_HOST=sesuaikan_host
DB_PORT=sesuaikan_port
DB_DATABASE=sesuaikan_nama_database
DB_USERNAME=root
DB_PASSWORD=
```
**6. Instal dependency node.js jika dibutuhkan**
```php
npm install
```
**7. Jalankan migrasi dan seeder**
```bash
php artisan migrate --seed
```
**7. Jalankan server**
```bash
php artisan serve
```
```bash
npm run dev
```

---

Silakan gunakan, modifikasi, dan kembangkan proyek ini sesuai kebutuhan.
