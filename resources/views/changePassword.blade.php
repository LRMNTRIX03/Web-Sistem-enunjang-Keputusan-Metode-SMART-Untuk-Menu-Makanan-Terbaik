@extends('Base.container')
@section('main')
<h3 class="fw-bold">Tambah Bobot & Kriteria</h3>
<form action="{{ route('password.update') }}" method="post">
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
    
     <div class="input-group mt-3 mb-3">
        <input type="password" class="form-control p-2" id="oldPassword" name="password" placeholder="Masukkan Password Lama" required>
        <span class="input-group-text toggle-password" data-target="#oldPassword"><i class="fa fa-eye"></i></span>
    </div>

    {{-- Password Baru --}}
    <div class="input-group mt-3 mb-3">
        <input type="password" class="form-control p-2" id="newPassword" name="password_baru" placeholder="Masukkan Password Baru" required>
        <span class="input-group-text toggle-password" data-target="#newPassword"><i class="fa fa-eye"></i></span>
    </div>

    {{-- Konfirmasi Password --}}
    <div class="input-group mt-3 mb-3">
        <input type="password" class="form-control p-2" id="confirmPassword" name="password_confirmation" placeholder="Konfirmasi Password Baru" required>
        <span class="input-group-text toggle-password" data-target="#confirmPassword"><i class="fa fa-eye"></i></span>
    </div>


    <button type="submit" class="btn btn-primary">Ganti</button>
</form>
@endsection

@section('script')
<script>
    document.querySelectorAll('.toggle-password').forEach(item => {
        item.addEventListener('click', function () {
            const input = document.querySelector(this.getAttribute('data-target'));
            const icon = this.querySelector('i');
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    });
</script>
@endsection
