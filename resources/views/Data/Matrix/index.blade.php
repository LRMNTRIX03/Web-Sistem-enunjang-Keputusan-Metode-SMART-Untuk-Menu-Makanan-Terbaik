@extends('Base.container')
@section('main')
<h3 class="fw-bold">Tabel Matrix</h3>
<div class="mt-5">
    <p>Data Perhitungan Dengan Metode Smart</p>
    <button data-bs-toggle="modal" data-bs-target="#modalAlternatif" class="btn btn-success">
        Tambah Perhitungan
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
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th scope="col" style="width: 5%;">No</th>
                <th scope="col">Awal Alternatif</th>
                <th scope="col">Akhir Alternatif</th>
                <th scope="col" style="width: 15%;">Aksi</th>
            </tr>
        </thead>
        <tbody class="m-5">
            @forelse ($perhitungan as $x)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $x->awal_alternatif }}</td>
                    <td>{{ $x->akhir_alternatif }}</td>
                    <td>
                      
                        <div class="d-flex gap-2 w-full">
                            <form action="{{ route('perhitungan.destroy', $x->id_perhitungan) }}" method="get" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <button class="btn btn-danger btn-md mt-2" type="submit">Delete</button>
                            </form>
                            <form action="{{ route('perhitungan.proses', $x->id_perhitungan) }}" method="post" class="form-proses">
                        @csrf
                        <button type="submit" class="btn btn-success btn-md mt-2 btn-proses">Proses</button>
                        <div class="spinner-border text-success mt-2 d-none" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        </form>
                            
                        </div>
                        

                       
                        
                        

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Data Kosong</td>
                </tr>
                @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $perhitungan->links() }}
    </div>
</div>


<div class="modal fade" id="modalAlternatif" tabindex="-1" aria-labelledby="modalAlternatifLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAlternatifLabel">Tambah Proses Perhitungan : </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('perhitungan.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        @error('AwalAlternatif')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label for="AwalAlternatif" class="form-label">Awal Alternatif</label>
                        <select name="AwalAlternatif" id="AwalAlternatif" class="form-select">
                            @foreach ($alternatif as $alt )
                                <option value="{{ $alt->id_alternatif }}">{{ $alt->nama_alternatif }}</option>
                            @endforeach
                        </select>
                          <label for="AkhirAlternatif" class="form-label">Akhir Alternatif</label>
                        <select name="AkhirAlternatif" id="AkhirAlternatif" class="form-select">
                            @foreach ($alternatif as $alt )
                                <option value="{{ $alt->id_alternatif }}">{{ $alt->nama_alternatif }}</option>
                            @endforeach
                        </select>
                      
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



