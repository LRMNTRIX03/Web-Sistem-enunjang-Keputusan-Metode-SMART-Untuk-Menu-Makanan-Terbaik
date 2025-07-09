@extends('Base.container')
@section('main')
<h3 class="fw-bold">Tambah Menu (Sub Kriteria)</h3>
<form action="{{ route('menu.store') }}" method="post">
    @csrf
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif
   @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
                <li>{{ session('error') }}</li>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="mb-3 mt-3">
        <label for="NamaMenu" class="form-label text-xl">Nama Menu : </label>
        <input type="text" name="NamaMenu" id="NamaMenu" class="form-control" placeholder="Masukan Nama Menu">
    </div>
    <div class="mb-3 mt-3">
        <label for="alternatif" class="form-label text-xl">Pilih Attribute</label>
        <select name="alternatif" id="alternatif" class="form-select" aria-label="Default select example">
            <option value="">Pilih Alternatif</option>
            @forelse ( $alternatif as $alt )
            <option value="{{ $alt->id_alternatif }}">{{ $alt->nama_alternatif }}</option>
            @empty
            <div class="mb-3 mt-2">
                <p>Tidak ada Alternatif atau Belum Ditambahkan</p>
            </div>
            @endforelse
           
        </select>
    </div>
    @forelse ($kriteria as $kr )
    
    @php
        $nama_kriteria = ucfirst($kr->nama_kriteria);
    @endphp
    <div class="mb-3 mt-3">
        <label for="{{ $kr->id_kriteria }}" class="form-label text-xl">{{ $nama_kriteria }}</label>
        <input type="number" name="{{ $kr->nama_kriteria }}" id="{{ $kr->id_kriteria }}" class="form-control" placeholder="Masukan Poin Contoh : 10" step="0.01">
    </div>
    @empty
    <div class="mb-3 mt-3">
        <p>Tidak ada Kriteria atau Belum Ditambahkan</p>
    </div>
    @endforelse
    @if (count($kriteria) == 4)
    <button type="submit" class="btn btn-primary">Tambah</button>
    <a class="btn btn-secondary" href={{route('menu.index')}}>Kembali</a>
        
    @else
        <p class="text-danger">Kriteria Harus 4 Sesuai dengan Dasar Teori yang Ada</p>
    @endif
    
</form>


  


@endsection