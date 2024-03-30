<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- FONT AWESOME --}}
    <script src="https://kit.fontawesome.com/cce5ebab8a.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen">
    {{-- @include('layout.sidebar') --}}
    <x-header>
    </x-header>
    <div class="flex min-h-screen">
        <aside class="fixed top-0 flex w-16 flex-col bg-blue-800 h-screen z-50">
            <div class="flex-none bg-cyan-600 w-16 h-16 flex items-center justify-center">
                <img src="img/Logo.png" alt="logo" class="w-12 h-12 p-1">
            </div>
            <a href="/dashboard" class="flex items-center">
                <img src="img/Home.svg" alt="logo" class="p-5">
            </a>
            <a href="/grafik" class="flex items-center">
                <img src="img/Statistik.svg" alt="logo" class="p-5">
            </a>
        </aside>
        <main class="main pt-8 bg-[#EAEBF0] w-full min-h-screen h-full pb-10">
            @yield('content')
        </main>
    </div>
    <script src="/js/currencyFormatter.js"></script>
</body>

</html>
