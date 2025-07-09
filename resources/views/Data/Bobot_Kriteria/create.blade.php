@extends('Base.container')
@section('main')
<h3 class="fw-bold">Tambah Kriteria & Bobot</h3>
<form action="{{ route('kriteria.store') }}" method="post">
    @csrf
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif
   @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="mb-3 mt-3">
        <label for="Kriteria" class="form-label text-xl">Nama Kriteria :</label>
        <input type="text" name="Kriteria" id="Kriteria" class="form-control" placeholder="Masukan Nama Kriteria">
    </div>
    <div class="mb-3 mt-3">
        <label for="Bobot" class="form-label text-xl">Bobot :</label>
        <input type="number" name="Bobot" id="Bobot" class="form-control" placeholder="Masukan Bobot Contoh : 10">
    </div>
    <div class="mb-3 mt-3">
        <label for="attribute" class="form-label text-xl">Pilih Attribute</label>
        <select name="attribute" id="id_kriteria" class="form-select" aria-label="Default select example">
            <option value="">Pilih Attribute</option>
            <option value="Benefit">Benefit</option>
            <option value="Cost">Cost</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
    <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">Kembali</a></a>
</form>


  


@endsection