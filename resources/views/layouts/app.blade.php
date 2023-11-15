<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .dropdown-list {
            max-height: 200px;
            overflow-y: auto;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 ">
    <div class="h-screen dark:bg-gray-900 flex flex-row">
        @include('layouts.navigation')
        <div class="w-full">
           
            
            <!-- Page Heading -->
            @if (isset($header))
                <header class="md:mx-5 lg:p-0 p-8 mx-20">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-2xl font-bold ">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="w-full">
                {{ $slot }}
            </main>
        </div>
    </div>
     {{-- <script>
        // Fungsi untuk mencegah kembali ke halaman sebelumnya
        function preventBack() {
            if(Auth::user()->role == 'petugas'){
                window.history.forward();
            }
        }

        // Menggunakan fungsi preventBack() saat pengguna mencoba kembali ke halaman sebelumnya
        setTimeout("preventBack()", 0);
        window.onunload = function () {
            null
        };
    </script> --}}
</body>

</html>
