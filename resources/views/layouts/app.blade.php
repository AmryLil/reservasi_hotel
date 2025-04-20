<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservasi Hotel - @yield('title', 'Laravel')</title>


    <!-- CSS -->
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Custom Styles -->
    <style>
        .border_custom {
            border-radius: 600px 400px 600px 400px;
            -webkit-border-radius: 600px 400px 600px 400px;
            -moz-border-radius: 600px 400px 600px 180px;
        }
    </style>
</head>

<body id="body" class=" font-jost">
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="relative px-24 mt-14">
        <div id="dark-body"
            class="transition-all duration-150 ease-in-out w-screen h-screen hidden start-0 bg-slate-50 opacity-45 z-40">
        </div>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')


    @yield('scripts')
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/handleModalProduct.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script> --}}
</body>

</html>
