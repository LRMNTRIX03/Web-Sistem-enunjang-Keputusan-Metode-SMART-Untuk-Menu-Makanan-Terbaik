@extends('Base.container')
@section('main')
<h3 class="fw-bold">Edit Menu (Sub Kriteria)</h3>
<form action="{{ route('menu.update', $menu->id_menu) }}" method="post">
    @csrf
    
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
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
        <label for="NamaMenu" class="form-label text-xl">Nama Menu :</label>
        <input type="text" name="NamaMenu" id="NamaMenu" class="form-control" value="{{ old('NamaMenu', $menu->nama_menu) }}" placeholder="Masukan Nama Menu">
    </div>

    <div class="mb-3 mt-3">
        <label for="alternatif" class="form-label text-xl">Pilih Attribute</label>
        <select name="alternatif" id="alternatif" class="form-select" aria-label="Default select example">
            <option value="">Pilih Alternatif</option>
            @forelse ($alternatif as $alt)
                <option value="{{ $alt->id_alternatif }}" {{ $alt->id_alternatif == $menu->id_alternatif ? 'selected' : '' }}>
                    {{ $alt->nama_alternatif }}
                </option>
            @empty
                <option disabled>Tidak ada Alternatif atau Belum Ditambahkan</option>
            @endforelse
        </select>
    </div>
        <div class="mb-3 mt-3">
           <label for="alori">Kalori</label>
            <input type="text" name="kalori" id="kalori" class="form-control" value="{{ old('kalori', $menu->kalori) }}" placeholder="Masukan Kalori Contoh : 10">
        </div>
        <div class="mb-3 mt-3">
           <label for="protein">Protein</label>
            <input type="text" name="protein" id="protein" class="form-control" value="{{ old('protein', $menu->protein) }}" placeholder="Masukan Kalori Contoh : 10">
        </div>
        <div class="mb-3 mt-3">
           <label for="lemak">Lemak</label>
            <input type="text" name="lemak" id="lemak" class="form-control" value="{{ old('lemak', $menu->lemak) }}" placeholder="Masukan Kalori Contoh : 10">
        </div>
        <div class="mb-3 mt-3">
           <label for="karbohidrat">Karbohidrat</label>
            <input type="text" name="karbohidrat" id="karbohidrat" class="form-control" value="{{ old('karbohidrat', $menu->karbohidrat) }}" placeholder="Masukan Kalori Contoh : 10">
        </div>

<div class="d-flex">
       <button type="submit" class="btn btn-success">Update</button>
       <a href="{{ route('menu.index') }}" class="btn btn-secondary ms-2">Kembali</a>
</div>
 
</form>
@endsection
