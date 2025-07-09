@extends('Base.container')
@section('main')
<h3>Edit Alternatif</h3>
<form action="{{ route('alternatif.update', $alternatif->id_alternatif) }}" method="post">
    @csrf
<div class="mb3">
<label for="nama" class="form-label">Nama Alternatif : </label>
<input type="text" name="nama" id="nama" class="form-control mb-3" aria-describedby="nameHelp" value="{{ $alternatif->nama_alternatif }}">
<button type="submit" class="btn btn-success">Update</button>
<a href="{{ route('alternatif.index') }}" class="btn btn-secondary">Kembali</a>

</div>
</form>
@endsection