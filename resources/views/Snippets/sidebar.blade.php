<aside
    id="sidebar"
    class="sidebar-container z-50 bg-pink-400 shadow-2xl d-none d-md-flex flex-column p-3 position-fixed max-h-screen overflow-y-auto md:overflow-visible"
>
    <div class="sidebar-item-container flex-grow-1">
        <div class="profile text-center mb-4">
            <img src="{{ asset('img/Logo-1.png') }}" alt="Logo Posyandu" class="img-fluid mx-auto logo-profile p-3" width="150px" height="150px">
            <p class="text-white text-xl fw-bold title-content">Posyandu Remaja Mawar</p>
            <hr class="border-white">
        </div>
        
        <ul class="ul-list list-unstyled">

            <a href="{{ route('user.dashboard') }}" class="text-decoration-none text-white fw-bold gap-2 d-flex hover:opacity-50 hover:bg-red-800 rounded transition-all duration-200 ease-in-out @if (request()->routeIs('user.dashboard')) active bg-red-800  @endif">
            <li class="side-item mb-3">
                    <i class="fa-solid fa-gauge me-2"></i>Dashboard
            </li>
            <a href="{{ route('alternatif.index') }}" class="text-decoration-none  text-white fw-bold gap-2 d-flex hover:opacity-50 hover:bg-red-800 rounded transition-all duration-200 ease-in-out @if (request()->is('data/alternatif*')) active bg-red-800  @endif">
            <li class ="side-item mb-3">
                <i class="fa-solid fa-road text-white me-2"></i>Alternatif</li>
            </a>
             </a>
               <a href="{{ route('kriteria.index') }}" class="text-decoration-none text-white fw-bold gap-2 d-flex hover:opacity-50 hover:bg-red-800 rounded transition-all duration-200 ease-in-out @if (request()->is('data/kriteria*')) active bg-red-800  @endif">
            <li class="side-item mb-3">
                <i class="fa-solid fa-weight-hanging me-2"></i>Kriteria & Bobot</li>
            </a>

             

            <a href="{{ route('menu.index') }}" class="text-decoration-none text-white fw-bold gap-2 d-flex hover:opacity-50 hover:bg-red-800 rounded transition-all duration-200 ease-in-out @if(request()->is('data/Menu*')) active bg-red-800  @endif")">
            <li class ="side-item mb-3">
                <i class="fa-solid fa-bowl-food text-white me-2"></i>Menu</li>
            </a>

          
     

          
            <a href="{{ route('perhitungan.index') }}" class="text-decoration-none text-white fw-bold gap-2 d-flex hover:opacity-50 hover:bg-red-800 rounded transition-all duration-200 ease-in-out @if(request()->is('data/perhitungan*')) active bg-red-800  @endif)">
            <li class="side-item mb-3">
                    <i class="fa-solid fa-list me-2"></i> Matrik

            </li>
            </a>
            <a href="{{ route('password.index') }}" class="text-decoration-none text-white fw-bold gap-2 d-flex hover:opacity-50 hover:bg-red-800 rounded transition-all duration-200 ease-in-out @if(request()->is('data/password*')) active bg-red-800  @endif)">
            <li class="side-item mb-3">
                    <i class="fa-solid fa-list me-2"></i> Ganti Password

            </li>
            </a>
        </ul>

        <div class="logout-container text-center mt-3">
            <button type="button" class="btn btn-danger w-75 py-2 d-flex align-items-center justify-content-center mx-auto rounded-md" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-right-from-bracket me-2"></i>
                <span class="fw-bold">Logout</span>
            </button>
        </div>
    </div>
</aside>

@include('Snippets.modal')
