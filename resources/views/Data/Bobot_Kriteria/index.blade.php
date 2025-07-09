@extends('Base.container')
@section('main')
<h3 class="fw-bold">Tabel Kriteria & Bobot</h3>
<div class="mt-5">
    <p>Data-data Kriteria dan Bobot</p>
    <a href="{{ route('kriteria.create') }}" class="btn btn-success">
        Tambah kriteria
    </a>
</div>
<hr>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
          <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nama Kriteria</th>
            <th scope="col">Bobot</th>
            <th scope="col">Attribute</th>
            <th scope="col">Aksi</th>
         </tr>   
        </thead>
        <tbody class="text-center">
            @forelse ($data as $x)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @php
                      $nama_kriteria = ucwords($x->nama_kriteria);
                    @endphp
                    <td>{{ $nama_kriteria }}</td>
                    <td>{{ $x->bobot }}</td>
                    <td>{{ $x->attribut }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('kriteria.edit', $x->id_kriteria) }}" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger" type="submit" data-bs-toggle="modal" data-bs-target="#modalHapus">Delete</button>
                           
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapus" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Informasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah anda ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
         <form action="{{ route('kriteria.destroy', $x->id_kriteria) }}" method="get">
                                <button class="btn btn-success" type="submit">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Data Kosong</td>
                </tr>
            @endforelse
        </tbody>
        
    </table>
    <div class="d-flex justify-content-center mt-4">
    {{ $data->links() }}
    </div>
</div>

</div>


  


@endsection