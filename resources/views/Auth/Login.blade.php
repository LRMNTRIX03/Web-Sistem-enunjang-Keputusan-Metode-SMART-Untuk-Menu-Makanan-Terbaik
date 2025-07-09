@extends('Base.base')
@section('content')
<nav class="d-flex bg-pink-400  p-2 fixed-top shadow">
    <div class="list-container d-flex d-md-none">
    </div>
        <div class="img-container"><img src="{{ asset('img/Logo-1.png') }}" alt="Logo Posyandu" class="img-fluid" width="100px" height="100px"></div>
        
        <h1 class="text-white mt-4">Posyandu Remaja Mawar</h1>
    </nav>

<main class="d-flex align-items-center justify-content-center min-h-screen pt-20">
    <section class="login-container flex justify-center w-full ">
        <div class="login-form flex flex-col p-20 border rounded shadow-lg w-full mb-5 md:w-1/3 sm:w-1/4 bg-white">
            <img src="{{ asset('img/Logo-1.png') }}" alt="Logo Posyandu" class="img-fluid mx-auto" width="100px" height="100px">
            <h2 class="text-center mb-2 p-3">Login</h2>
            <hr>
           
          
            <form action="{{ route('auth.login') }}" method="post">
                @csrf
                <div class="mb-3 px-5">
                    <label for="username" class="form-label"><h5>Username</h5></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control p-2" id="username" name="username" placeholder="Username" required>
                    </div>
                </div>
                
                <div class="mb-3 px-5">
                    <label for="password" class="form-label"><h5>Password</h5></label>
                    
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" class="form-control p-2" id="password" name="password" placeholder="Masukkan Password" required>
                        <span class="input-group-text" id="togglePassword"><i class="fa fa-eye"></i></span>
                    </div>
                </div>
                
<div class="mb-3 px-5">
    @if (session()->has('error'))
        <div class="alert alert-danger text-center py-2 rounded shadow-md">
            {{ session('error') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success text-center py-2 rounded shadow-md">
            {{ session('success') }}
        </div>
    @endif
</div>

                
                <div class="mb-1 text-center p-3">
                    <button type="submit" class="btn-login w-1/2 py-2 bg-pink-400 text-white rounded hover:bg-pink-500 ">
                        <div class="d-flex w-100 align-items-center justify-content-center">
                            <i class="fa-solid fa-right-to-bracket text-2xl"></i> 
                            <h4 class="mt-2 mx-3 fw-bold">Login</h4>
                        </div>
                    </button>
                    
                </div>
            </form>
            <div class="mt-3 d-flex align-items-center justify-content-center">
    <form action="{{ route('password.default') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary d-flex w-100 align-items-center justify-content-center">
            <i class="fa-solid fa-key text-xl"></i> 
            <h5 class="mt-2 mx-3 fw-bold">Reset Password</h5>
        </button>
    </form>
</div>
        </div>
    </section>
</main>

@section('script')
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye-slash');
    })
</script>
@endsection

@endsection
