<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen">
    {{-- @include('layout.sidebar') --}}
    <x-header>
    </x-header>
    <div class="flex min-h-screen">
        <aside class="fixed top-0 flex w-16 flex-col bg-blue-800 h-screen">
            <div class="flex-none bg-cyan-600 w-16 h-16 flex items-center justify-center">
                <img src="img/Logo.png" alt="logo" class="w-12 h-12 p-1">
            </div>
            <a href="#" class="flex items-center">
                <img src="img/Home.svg" alt="logo" class="p-5">
            </a>
            <a href="#" class="flex items-center">
                <img src="img/Statistik.svg" alt="logo" class="p-5">
            </a>
        </aside>
        <main class="main pt-8 bg-gray-100 w-full h-full pb-10">
            @yield('content')
        </main>
    </div>

</body>

</html>
