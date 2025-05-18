<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Jquery,font-awesome, font for my website and ajax here --}}
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.tailwindcss.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.tailwindcss.css">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="{{asset('assets/js/myJS.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('assets/css/myStyle.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <title>@yield('title')</title>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    </style>
    @vite('resources/css/app.css')
</head>
<body>
    <main class="container">
        {{ $slot }}
    </main>
</body>
</html>