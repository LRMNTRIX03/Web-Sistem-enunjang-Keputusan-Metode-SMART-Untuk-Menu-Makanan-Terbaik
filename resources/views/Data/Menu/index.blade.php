@extends('Base.container')

@section('main')
<h3 class="fw-bold">Tabel Menu</h3>
<div class="mt-5">
    <p>Data-data Menu dari setiap alternatif</p>
    <div class="mb-3">
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
    <form action="{{ route('menu.index') }}" method="get">
    <label for="alternatif">Cari Alternatif : </label>
    <select class="form-select" name="alternatif" id="alternatif" onchange="this.form.submit()">
        <option value="">Pilih Alternatif</option>
        @foreach ($alternatif as $alt )
            <option value="{{ $alt->id_alternatif }}" {{ request('alternatif') == $alt->id_alternatif ? 'selected' : '' }}>
                {{ $alt->nama_alternatif }}
            </option>
        @endforeach
    </select>
</form>
    </div>
    @if ($total_alternatif > 0)
    <a href="{{ route('menu.create') }}" class="btn btn-success">Tambah Menu</a>
    @else
    <p class="text-danger fw-bold">Silahkan tambah Alternatif terlebih dahulu</p>
    @endif
</div>
<hr>
<div class="table-responsive">
    <table class="table table-hover table-striped mb-4">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Alternatif</th>
                <th>Nama Menu</th>
                <th>Kalori</th>
                <th>Protein</th>
                <th>Lemak</th>
                <th>Karbohidrat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @forelse ($Menu as $m)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>Alternatif {{ $m->alternatif->id_alternatif }}</td>
                <td>{{ $m->nama_menu }}</td>
                <td>{{ $m->kalori }}</td>
                <td>{{ $m->protein }}</td>
                <td>{{ $m->lemak }}</td>
                <td>{{ $m->karbohidrat }}</td>
                <td>
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('menu.edit', $m->id_menu) }}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $m->id_menu }}">
                            Delete
                        </button>
                    </div>
                </td>
            </tr>

           
            <div class="modal fade" id="modalHapus{{ $m->id_menu }}" tabindex="-1" aria-labelledby="modalHapusLabel{{ $m->id_menu }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalHapusLabel{{ $m->id_menu }}">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus <strong>{{ $m->nama_menu }}</strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('menu.destroy', $m->id_menu) }}" method="get">
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
    {{ $Menu->links() }}
    </div>
</div>
@endsection
