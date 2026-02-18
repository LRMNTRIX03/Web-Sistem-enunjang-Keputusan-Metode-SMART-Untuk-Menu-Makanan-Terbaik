<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="CSRF-TOKEN" content="{{ csrf_token() }}">   
    <title>{{ $title }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{ asset('img/Logo-1.png') }}">
    <link rel="stylesheet" href="{{   asset($style )}}">
    {{-- <link rel="stylesheet" href="{{   asset('css/dashboard.css')}}"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
  <body>
    @yield('content')
    
   
  </body>
  @yield('script')
</html>