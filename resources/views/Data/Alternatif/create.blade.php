@extends('Base.container')
@section('main')
<h3 class="fw-bold">Tambah Bobot & Kriteria</h3>
<form action="" method="post">
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
        <label for="Menu1" class="form-label text-xl">Menu 1 : </label>
        <input type="text" name="Menu1"  class="form-control" placeholder="Masukan Nama Menu 1">
    </div>
     <div class="mb-3 mt-3">
        <label for="Menu2" class="form-label text-xl">Menu 2 : </label>
        <input type="text" name="Menu2"  class="form-control" placeholder="Masukan Nama Menu 2">
    </div>
     <div class="mb-3 mt-3">
        <label for="Menu3" class="form-label text-xl">Menu 3 : </label>
        <input type="text" name="Menu3"  class="form-control" placeholder="Masukan Nama Menu 3">
    </div>
     <div class="mb-3 mt-3">
        <label for="Menu4" class="form-label text-xl">Menu 4 : </label>
        <input type="text" name="Menu4"  class="form-control" placeholder="Masukan Nama Menu 4">
    </div>
     <div class="mb-3 mt-3">
        <label for="Menu5" class="form-label text-xl">Menu 5 : </label>
        <input type="text" name="Menu5"  class="form-control" placeholder="Masukan Nama Menu 5">
    </div>
    <button type="submit" class="btn btn-primary">Selanjutnya</button>
</form>
@endsection