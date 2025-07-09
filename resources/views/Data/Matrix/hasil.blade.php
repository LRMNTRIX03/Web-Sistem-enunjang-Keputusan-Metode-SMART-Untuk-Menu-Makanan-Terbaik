@extends('Base.container')

@section('main')
    <h3 class="fw-bold">Hasil Perhitungan Metode SMART</h3>

    <div class="mt-3">
        <a href="{{ route('perhitungan.index') }}" class="btn btn-secondary mb-4">← Kembali ke Daftar Perhitungan</a>
    </div>

   
    <h5 class="fw-semibold">1. Tabel Utility (Normalisasi)</h5>
    <div class="table-responsive mb-5">
        <table class="table table-bordered align-middle">
            <thead class="table-light text-center">
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
                    <tr class="text-center">
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
    </div>


    <h5 class="fw-semibold">2. Skor Akhir dan Peringkat</h5>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-light text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Alternatif</th>
                    <th>Nilai Akhir</th>
                    <th>Peringkat</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $peringkat = 1;
                    $ranking = $hasil->sortByDesc('nilai_akhir');
                    $tertinggi = $ranking->first()->nilai_akhir;
                    $terendah = $ranking->last()->nilai_akhir;
                @endphp
                @foreach ($ranking as $item)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->alternatif->nama_alternatif ?? 'Alternatif #' . $item->id_alternatif }}</td>
                        <td><strong>{{ number_format($item->nilai_akhir, 4) }}</strong></td>
                        <td>
                            <span class="badge bg-success fs-6">{{ $peringkat++ }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="kesimpulan-container container-fluid">
        <div class="kesimpulan-content d-flex flex-column">
        <p>Dari 10 Alternatif yang sudah dipilih. Nilai terendah ada pada menu makanan sehat di Alternatif ke <strong>{{ $ranking->last()->alternatif->id_alternatif }}</strong> dengan nilai akhir sebesar <strong>{{ number_format($terendah, 4) }}
        </strong> Menu yang terbaik adalah menu pada alternatif ke <strong>{{ $ranking->first()->alternatif->id_alternatif }}</strong> dengan nilai akhir sebesar <strong>{{ number_format($tertinggi, 4) }}</strong></strong></p>

       <h3 class="fw-bold ">Kesimpulan</h3>
       <h4>Menu Terbaik : Alternatif ke {{ $ranking->first()->alternatif->id_alternatif }} dengan Nilai {{ number_format($tertinggi, 4) }}</h4>
       <h4>Menu Terendah : Alternatif ke {{ $ranking->last()->alternatif->id_alternatif }} dengan Nilai {{ number_format($terendah, 4) }}</h4>
       <a href="{{ route('perhitungan.export-pdf', $hasil->first()->id_perhitungan) }}" class="btn btn-success mb-4">📄 Export ke PDF</a>
       </div>
        
    </div>
@endsection
