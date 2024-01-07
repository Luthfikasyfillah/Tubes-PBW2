<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        @media(max-width:1520px) {
            .left-svg {
                display: none;
            }
        }

        /* Menambahkan kelas transparan */
        .bg-transparent {
            background-color: transparent;
        }

        /* Menambahkan kelas untuk background saat tidak transparan */
        .bg-non-transparent {
            background-color: rgb(30 64 175);
            /* Warna biru dengan transparansi */
        }

        /* Tambahkan kelas khusus untuk drop shadow */
        .custom-drop-shadow {
            filter: drop-shadow(0 4px 4px rgba(0, 0, 0, 0.25));
        }
    </style>
    {{-- Begin Header Section --}}
    @section('header')
    </head>
    <nav id="navbar"
        class=" fixed w-full flex items-center justify-between px-2 sm:px-6 lg:px-8 h-16 bg-non-transparent transition duration-300 ease-in-out">
        <!-- Logo -->
        <div id="logo" class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="inline-block">
                <a href="{{ url('/') }}">
                    <img src="Logo/LogoERIT.svg" alt="E-RIT">
                </a>
            </div>
        </div>
        <!-- Menu -->
        <div id="menu"
            class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <!-- Menu untuk desktop -->
            <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4">
                    <a href="#footer"
                        class="hover:border-gray-200 hover:rounded-md text-white hover:bg-sky-400 hover:text-white-grey-400 rounded-md px-3 py-2 text-sm font-medium transition duration-300 ease-in-out">Tentang
                        Kami</a>
                    <script>
                        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                            anchor.addEventListener('click', function(e) {
                                e.preventDefault();
                                document.querySelector(this.getAttribute('href')).scrollIntoView({
                                    behavior: 'smooth'
                                });
                            });
                        });
                    </script>
                    @auth
                    <a href="/logout" class="hover:border-gray-200 hover:rounded-md text-white hover:bg-sky-400 hover:text-white-grey-400 rounded-md px-3 py-2 text-sm font-medium transition duration-300 ease-in-out">Log Out</a>    
                    @else
                    <a href="/signup" class="hover:border-gray-200 hover:rounded-md text-white hover:bg-sky-400 hover:text-white-grey-400 rounded-md px-3 py-2 text-sm font-medium transition duration-300 ease-in-out">Sign Up</a>
                    @endauth
                </div>
            </div>
            <!-- Menu untuk mobile -->
            <div class="block sm:hidden">
                <button
                    class="flex items-center px-3 py-2 border rounded text-white border-white hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
                <div class="hidden pt-2">
                    <a href="#footer" class="block px-2 py-1 text-white hover:bg-gray-700">Tentang Kami</a>
                    <a href="#" class="mt-1 block px-2 py-1 text-white hover:bg-gray-700">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>
    <script>
        // Mendapatkan referensi elemen
        const navbar = document.getElementById('navbar');
        const logo = document.getElementById('logo');
        const menu = document.getElementById('menu');

        // Fungsi untuk mengecek posisi scroll dan mengatur visibilitas elemen
        function checkScroll() {
            if (window.scrollY > 100) { // Jika posisi scroll lebih dari 100px
                navbar.classList.add('bg-transparent'); // Tambahkan kelas transparan
                logo.classList.add('invisible'); // Sembunyikan logo
                menu.classList.add('invisible'); // Sembunyikan menu
            } else {
                navbar.classList.remove('bg-transparent'); // Hapus kelas transparan
                logo.classList.remove('invisible'); // Tampilkan logo
                menu.classList.remove('invisible'); // Tampilkan menu
            }
        }

        // Event listener untuk scroll
        window.addEventListener('scroll', checkScroll);
    </script>
    </head>

    <!-- End Header Section-->

    <!-- BEGIN HERO SECTION -->
@section('content')
    <div id="bounceButton"
        class="animate-bounce fixed bottom-10 right-10 opacity-0 transition-opacity duration-500 ease-in-out">
        <button class="bg-cyan-400 text-white rounded-full p-2" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
            </svg>
        </button>
    </div>

    <script>
        const bounceButton = document.getElementById('bounceButton');
        let scrollPosition = 0;

        window.addEventListener('scroll', () => {
            const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop;
            if (currentScrollPosition > scrollPosition) {
                bounceButton.classList.remove('opacity-0');
            } else {
                bounceButton.classList.add('opacity-0');
            }
            scrollPosition = currentScrollPosition <= 0 ? 0 :
                currentScrollPosition; // For Mobile or negative scrolling
        }, false);
    </script>

    <body class="bg-white dark:bg-black">
        <div class="container flex flex-col items-center justify-between max-w-6xl px-8 mx-auto lg:flex-row xl:px-0">
            <div
                class="z-30 flex flex-col items-center w-full max-w-xl pt-48 text-center lg:items-start lg:w-1/2 lg:pt-20 xl:pt-40 lg:text-left">
                <h1
                    class="relative mb-4 text-3xl font-black leading-tight text-gray-900 dark:text-white sm:text-5xl xl:mb-8">
                    LET'S SAVE YOUR MONEY WITH <span class="text-blue-800 custom-drop-shadow">E-RIT</span>
                </h1>

                <p class="pr-0 mb-8 text-base text-gray-600 dark:text-gray-400 sm:text-lg xl:text-xl lg:pr-20">
                    Jadikan keuangan Anda lebih rapi, jelas, terpantau, dan capai tujuan Anda dengan E-RIT
                </p>
                <div>
                    <a href="{{ url('dashboard') }}"
                        class="hover:shadow-outline-glow hover:opacity-80 active:shadow-outline-glow relative 
                        inline-block w-full sm:w-44 px-8 py-2 sm:py-4 mx-auto text-center font-bold text-white 
                        bg-cyan-400 border-t border-gray-200 rounded-md shadow-xl mt-0 sm:mt-1">Mulai</a>
                </div>
                <!-- Gambar -->
                <div class="flex-col hidden mt-12 sm:flex lg:mt-24">
                    <div class="flex">
                        <svg
                            class="h-7 mr-4 text-gray-500 duration-150 cursor-pointer fill-current transition-color hover:text-gray-600">
                    </div>
                </div>
                <svg class="absolute left-0 max-w-md mt-24 -ml-64 left-svg" viewBox="0 0 423 423"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                </svg>
            </div>
            <div class="relative z-50 flex flex-col items-end justify-center w-full h-full lg:w-1/2 ms:pl-10">
                <div class="container pt-20 relative left-0 w-full max-w-4xl lg:absolute xl:max-w-2xl lg:w-screen max-h-96">
                    <img src="logo/PicFitur5.png" class="w-4/5 h-4/5">
                </div>
            </div>
        </div>
        <div class="inset-x-16 pt-56 mx-auto max-w-screen-lg sm:px-6 lg:px-8">
            <div class="bg-blue-800 rounded-3xl flex flex-col sm:flex-row justify-center px-6 py-4 sm:px-8">
                <img class="w-full h-auto sm:w-24 md:w-60 lg:w-60 mr-10" src="Logo/IconUang.svg" alt="E-RIT">
                <div class="p-8 text-white">
                    <h3 class="text-lg font-bold uppercase mb-4">Cara Kerja E-RIT</h3>
                    <div class="flex flex-col items-start space-y-4 relative">
                        <div class="absolute h-3/4 w-px bg-no-repeat bg-dashed bg-white left-4 top-12"></div>
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-8 h-8 bg-cyan-400 rounded-full flex items-center justify-center text-base text-white font-bold relative z-10 hover:w-12 hover:h-12 transition-all duration-100 zoomable">
                                1</div>
                            <p>Pilih fitur</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-8 h-8 bg-cyan-400 rounded-full flex items-center justify-center text-base text-white font-bold relative z-10 hover:w-12 hover:h-12 transition-all duration-100 zoomable">
                                2</div>
                            <p>Klik button <b>Tambah Pemasukan,<br> Tambah Pengeluaran</b>, atau <b>Tambah Tabungan</b></p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-8 h-8 bg-cyan-400 rounded-full flex items-center justify-center text-base text-white font-bold relative z-10 hover:w-12 hover:h-12 transition-all duration-100 zoomable">
                                3</div>
                            <p>Isi semua formulir</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-8 h-8 bg-cyan-400 rounded-full flex items-center justify-center text-base text-white font-bold relative z-10 hover:w-12 hover:h-12 transition-all duration-100 zoomable">
                                4</div>
                            <p>Setelah selesai, klik button <b>Simpan</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @section('footer')
        <footer id="footer" class="pt-20">
            <div class="flex mx-auto bg-blue-800 px-4 pt-12 pb-8 text-white">
                <div class="container grid grid-cols-3 gap-4 max-w-6xl px-4 mx-auto overflow-hidden lg:flex-row">
                    <div class="col-span-1">
                        <div class="inline-block">
                            <a href="/">
                                <img src="Logo/LogoERIT.svg" alt="E-RIT">
                            </a>
                        </div>
                        <p class="mt-6 mr-4 text-white text-justify">
                            <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Telekomunikasi.+1,+Terusan+Buahbatu+-+Bojongsoang,+Telkom+University,+Sukapura,+Kec.+Dayeuhkolot,+Kabupaten+Bandung,+Jawa+Barat+40257"
                                target="_blank" class="hover:text-gray-500 focus:text-blue-500">
                                Jl. Telekomunikasi. 1, Terusan Buahbatu-Bojongsoang, Telkom University, Sukapura, Kec.
                                Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257
                            </a>
                        </p>
                    </div>
                    <div class="col-span-1 ">
                        <h2 class="text-xl font-bold text-white mb-4 pt-4 text-center">Tentang Kami</h2>
                        <p class="pt-5 text-white text-justify ">E-RIT (Elektronik Rekap Duit),
                            Kami menghadirkan platform
                            pengelolaan keuangan yang dirancang khusus untuk membantu masyarakat mengelola keuangan
                            pribadinya
                            dengan lebih efisien dan efektif. Aplikasi ini menyediakan berbagai fitur yang memungkinkan
                            pengguna
                            merencanakan, memantau, dan mengontrol keuangannya dengan lebih baik.</p>
                    </div>

                    <div class="col-span-1 text-right">
                        <div class="inline-block font-bold text-white text-xl mb-4 pt-4 ">Ikuti Kami</div>
                        <div
                            class="flex flex-col sm:flex-row justify-end items-end sm:items-center pt-5 space-y-4 sm:space-y-0 sm:space-x-4">
                            <a href="#" class="flex items-center transform hover:scale-110"><img class="h-8 w-auto"
                                    src="Logo/instagram.svg" alt="Instagram"></a>
                            <a href="#" class="flex items-center transform hover:scale-110"><img class="h-8 w-auto"
                                    src="Logo/twitter.svg" alt="Twitter"></a>
                            <a href="#" class="flex items-center transform hover:scale-110"><img class="h-8 w-auto"
                                    src="Logo/fb.svg" alt="Facebook"></a>
                            <a href="#" class="flex items-center transform hover:scale-110"><img class="h-9 w-auto"
                                    src="Logo/mail.svg" alt="Email"></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class=" pt-8 pb-8  text-center text-black dark:text-white ">© 2023 E-RIT | E-RIT adalah merek dari Bumandhala
        </div>
    </body>

    </html>
