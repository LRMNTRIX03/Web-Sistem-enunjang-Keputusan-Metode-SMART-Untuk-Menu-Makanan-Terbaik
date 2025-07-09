@extends('Base.container')
@section('main')
<h3 class="fw-bold">Tabel Alternatif</h3>
<div class="mt-5">
    <p>Data-data mengenai kandidat yang akan dievaluasi di representasikan dalam tabel berikut:</p>
    <button data-bs-toggle="modal" data-bs-target="#modalAlternatif" class="btn btn-success">
        Tambah Alternatif
    </button>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
<hr>
<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle shadow-sm">
        <thead class="table-light">
            <tr>
                <th scope="col" style="width: 5%;">No</th>
                <th scope="col">Nama Alternatif</th>
                @foreach ($kriteria as $z)
                    <th scope="col">{{ $z->nama_kriteria }}</th>
                @endforeach
                <th scope="col" style="width: 15%;">Aksi</th>
            </tr>
        </thead>
        <tbody class="m-5">
            @forelse ($data as $x)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $x->nama_alternatif }}</td>
                    @foreach ($kriteria as $k)
                    @php
                        $nama_kriteria = strtolower($k->nama_kriteria);
                        $total = $totalNilai[$x->id_alternatif][$nama_kriteria] ?? 0;
                    @endphp
                    <td>{{ $total }}</td>
                @endforeach

                    <td>
                      
                        <div class="d-flex gap-2 w-full">
                            <a href="{{ route('alternatif.edit', $x->id_alternatif) }}" class="btn btn-primary btn-md">Edit</a>
                            <form action="{{ route('alternatif.destroy', $x->id_alternatif) }}" method="get" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <button class="btn btn-danger btn-md" type="submit">Delete</button>
                            </form>
                            
                        </div>
                            <a href="{{ route('alternatif.detail', $x->id_alternatif) }}" class="btn btn-success btn-md mt-2">Lihat Detail</a>
                  
                      
                       
                        
                        

                    </td>
                </tr>
                <div id="delete-confirmation">

                </div>
            @empty
                @php
                    $totalKolom = 2 + $kriteria->count() + 1; 
                @endphp
                <tr>
                    <td colspan="{{ $totalKolom }}" class="text-center">Data Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $data->links() }}
    </div>
</div>


<div class="modal fade" id="modalAlternatif" tabindex="-1" aria-labelledby="modalAlternatifLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAlternatifLabel">Tambah Alternatif : </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('alternatif.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="namaAlternatif" class="form-label">Nama Alternatif</label>
                        <input type="text" name="namaAlternatif" id="namaAlternatif" class="form-control @error('namaAlternatif') is-invalid @enderror" placeholder="Masukkan Nama Alternatif" required>
                        @error('namaAlternatif')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

