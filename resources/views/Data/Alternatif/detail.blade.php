@extends('Base.container')

@section('main')
<h3 class="fw-bold">Tabel Detail Alternatif</h3>
<div class="mt-5">
    <p>Data Detail Alternatif</p>
</div>
<hr>
<div class="table-container">
    <table class="table table-hover table-striped mb-4">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Alternatif</th>
                <th>Nama Menu</th>
                <th>Protein</th>
                <th>Karbohidrat</th>
                <th>Lemak</th>
                <th>Kalori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @forelse ($detailAlternatif as $m)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>Alternatif {{ $m->alternatif->id_alternatif }}</td>
                <td>{{ $m->nama_menu }}</td>
                <td>{{ $m->protein }}</td>
                <td>{{ $m->karbohidrat }}</td>
                <td>{{ $m->lemak }}</td>
                <td>{{ $m->kalori }}</td>
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
                <td colspan="7" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <a href="{{ route('alternatif.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
