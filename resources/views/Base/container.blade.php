@extends('Base.base')
@section('content')
@include('Snippets.navbar')
@include('Snippets.sidebar')
<main class="d-flex w-100 p-3" id="main-content">
    <h1 class="text-black fw-bold">{{ $title }}</h1>
    <div class="container-fluid content-container p-2 d-flex">
        <div class="content bg-pink-200 w-75 p-5">
         @yield('main')

        </div>
        

    </div>
    <span class="d-flex justify-between w-75 text-white fw-bold">
        <p>2025 © SPK SMART </p>
        <p class="flex-end">©xxxxxx</p>
    </span>
   
     
    
</main>
@section('script')
<script>

document.addEventListener('DOMContentLoaded', function () {
    const btnSide = document.getElementById('btn-side');
    const sidebar = document.getElementById('sidebar');
    const prosesForms = document.querySelectorAll('.form-proses');

    if (btnSide && sidebar) {
        btnSide.addEventListener('click', () => {
          
            if (window.innerWidth < 768) {
               
                sidebar.classList.toggle('d-none');
                sidebar.classList.toggle('d-flex');
            }
        });
    }


    prosesForms.forEach(form => {
            form.addEventListener('submit', function () {
                const button = form.querySelector('.btn-proses');
                const spinner = form.querySelector('.spinner-border');

                
                button.disabled = true;

                
                spinner.classList.remove('d-none');
            });
        });
});



</script>
@endsection

@endsection