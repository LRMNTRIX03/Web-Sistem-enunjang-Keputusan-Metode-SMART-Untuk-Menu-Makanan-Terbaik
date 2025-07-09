<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
        h3, h5 { margin: 0; padding: 0; }
    </style>
</head>
<body>
    <h3>Hasil Perhitungan Metode SMART</h3>
    
    <h5>1. Tabel Utility (Normalisasi)</h5>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Alternatif</th>
                <th>Kalori</th>
                <th>Protein</th>
                <th>Lemak</th>
                <th>Karbohidrat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasil as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->alternatif->nama_alternatif ?? 'Alternatif #' . $item->id_alternatif }}</td>
                    <td>{{ number_format($item->kalori, 4) }}</td>
                    <td>{{ number_format($item->protein, 4) }}</td>
                    <td>{{ number_format($item->lemak, 4) }}</td>
                    <td>{{ number_format($item->karbohidrat, 4) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @php
        $ranking = $hasil->sortByDesc('nilai_akhir');
        $tertinggi = $ranking->first()->nilai_akhir;
        $terendah = $ranking->last()->nilai_akhir;
        $peringkat = 1;
    @endphp

    <h5>2. Skor Akhir dan Peringkat</h5>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Alternatif</th>
                <th>Nilai Akhir</th>
                <th>Peringkat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ranking as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->alternatif->nama_alternatif ?? 'Alternatif #' . $item->id_alternatif }}</td>
                    <td>{{ number_format($item->nilai_akhir, 4) }}</td>
                    <td>{{ $peringkat++ }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>
        Dari 10 Alternatif yang sudah dipilih, nilai terendah ada pada alternatif ke <strong>{{ $ranking->last()->alternatif->id_alternatif }}</strong>
        dengan nilai akhir sebesar <strong>{{ number_format($terendah, 4) }}</strong>. Menu terbaik adalah alternatif ke
        <strong>{{ $ranking->first()->alternatif->id_alternatif }}</strong> dengan nilai <strong>{{ number_format($tertinggi, 4) }}</strong>.
    </p>
    <h3 class="fw-bold ">Kesimpulan</h3>
       <h4>Menu Terbaik : Alternatif ke {{ $ranking->first()->alternatif->id_alternatif }} dengan Nilai {{ number_format($tertinggi, 4) }}</h4>
       <h4>Menu Terendah : Alternatif ke {{ $ranking->last()->alternatif->id_alternatif }} dengan Nilai {{ number_format($terendah, 4) }}</h4>
       </div>
</body>
</html>
