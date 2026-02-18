@extends('Base.base')
@section('content')
@include('Snippets.navbar')
@include('Snippets.sidebar')
<main class="d-flex w-100 p-3" id="main-content">
    <h1 class="text-black fw-bold">Dashboard</h1>
    <div class="container-fluid content-container p-2 d-flex">
        <div class="content bg-pink-200 w-75 p-5">
            <h4 class="fw-bold mb-5">Sistem Penunjang Keputusan</h4>
            <hr>
            <p class="text-justify">
    Sistem Pendukung Keputusan (SPK) adalah sistem berbasis komputer yang digunakan untuk membantu proses pengambilan keputusan dalam situasi semi-terstruktur maupun tidak terstruktur. SPK bukanlah sistem yang menggantikan keputusan manusia, melainkan sebagai alat bantu yang memberikan berbagai alternatif solusi dan analisis terhadap data yang tersedia, sehingga pengambil keputusan dapat menentukan keputusan yang paling tepat.
</p>
<p class="text-justify mt-3">
    Salah satu metode yang digunakan dalam SPK adalah <strong>Simple Multi-Attribute Rating Technique (SMART)</strong>. SMART adalah metode pengambilan keputusan multikriteria yang digunakan untuk mengevaluasi dan memilih alternatif terbaik dari sejumlah pilihan berdasarkan kriteria yang telah ditentukan. SMART bersifat sederhana dan mudah diterapkan karena menggunakan pendekatan nilai (value-based approach).
</p>
<p class="text-justify mt-3">
    Berikut ini adalah tahapan penyelesaian dengan menggunakan metode SMART:
</p>
<ol class="list-decimal pl-5">
    <li><p><strong>Identifikasi Alternatif dan Kriteria:</strong> Tentukan alternatif-alternatif keputusan yang akan dibandingkan serta kriteria-kriteria evaluasi yang relevan untuk setiap alternatif.</p></li>
    <li><p><strong>Penentuan Bobot Kriteria (Wi):</strong> Setiap kriteria diberikan bobot berdasarkan tingkat kepentingannya. Bobot ini biasanya dinyatakan dalam bentuk persentase atau skala numerik, dan total bobot seluruh kriteria harus sama dengan 1 atau 100%.</p></li>
    <li><p><strong>Penilaian Alternatif (Xi):</strong> Berikan nilai atau skor untuk setiap alternatif terhadap masing-masing kriteria. Penilaian ini bisa bersifat subjektif (berdasarkan pendapat ahli) atau objektif (berdasarkan data).</p></li>
    <li><p><strong>Perhitungan Nilai Utility:</strong> Nilai setiap alternatif dikalikan dengan bobot kriteria yang bersesuaian.</p>
    </li>
    <li><p><strong>Perankingan:</strong> Alternatif dengan skor tertinggi merupakan alternatif terbaik yang direkomendasikan oleh sistem.</p></li>
</ol>

<hr>

<p class="text-justify">
    Keunggulan dari metode SMART adalah kemudahan dalam penggunaannya, fleksibilitas dalam penentuan skala penilaian, dan tidak memerlukan normalisasi data yang rumit. Namun, kelemahan utamanya terletak pada subjektivitas dalam pemberian bobot dan skor yang bisa saja bias jika tidak dilakukan dengan cermat.
</p>
<p class="text-justify">
    Dengan demikian, metode SMART sangat sesuai untuk digunakan dalam situasi pengambilan keputusan yang melibatkan banyak kriteria namun tetap membutuhkan pendekatan yang intuitif dan efisien.
</p>


        </div>
        

    </div>
  
   
     
    
</main>
@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const btnSide = document.getElementById('btn-side');
    const sidebar = document.getElementById('sidebar');
   

    if (btnSide && sidebar) {
        btnSide.addEventListener('click', () => {
          
            if (window.innerWidth < 768) {
               
                sidebar.classList.toggle('d-none');
                sidebar.classList.toggle('d-flex');
            }
        });
    }
});



</script>
@endsection

@endsection