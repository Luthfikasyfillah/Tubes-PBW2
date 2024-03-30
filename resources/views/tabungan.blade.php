@extends('layout.app')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        /* Styling for the overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        /* Styling for the confirmation box */
        .confirmation-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
    </style>
</head>
@section('content')
    <div class="flex flex-col md:flex-row items-start ml-28 mr-12">
        <div class="mb-4 lg:mb-0">
            <div class="font-bold text-2xl">Hai, {{ Auth::user()->name }}!</div>
            <div class="font-medium text-gray-500">Bagaimana kabarmu hari ini?</div>
        </div>
        <div class="flex-grow"></div>
        <div class="flex p-3 gap-3 justify-center items-center bg-white bg-opacity-50 rounded-lg">
            <img src="img/kalender.svg" class="h-6 w-6">
            <div id="currentDate" class="font-bold text-sm"></div>
            <div id="currentTime" class="font-bold text-sm"></div>
        </div>
    </div>
    <script>
        function updateDateTime() {
            const currentDateElement = document.getElementById('currentDate');
            const currentTimeElement = document.getElementById('currentTime');

            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const dateFormatted = now.toLocaleDateString('id-ID', options);

            const timeOptions = {
                hour: 'numeric',
                minute: '2-digit',
                hour12: true
            };
            const timeFormatted = now.toLocaleTimeString('id-ID', timeOptions);

            currentDateElement.textContent = dateFormatted;
            currentTimeElement.textContent = timeFormatted;
        }

        // Panggil fungsi updateDateTime setiap detik untuk memperbarui tanggal dan waktu
        setInterval(updateDateTime, 1000);

        // Panggil fungsi sekali pada awal untuk menetapkan tanggal dan waktu awal
        updateDateTime();
    </script>
    <div class="flex flex-col md:flex-row ml-28 mr-12 pt-8 gap-5">
        <div class="flex flex-col lg:w-3/4">
            <div class="flex flex-col lg:flex-row gap-5 justify-left items-start w-full pb-4">
                <div class="p-3 bg-white bg-opacity-40 w-full lg:w-1/3 rounded-lg">
                    <a href="pemasukan"> <button class="font-medium text-gray-500">Pemasukan</button></a>
                    <h1 class="font-bold text-2xl pb-1 formatUang">{{ $pemasukans->sum('nominalPemasukan') }}</h1>
                    <button
                        class="text-gray-500 text-sm text-center align-middle bg-white border-2 border-gray-300 rounded-full px-2"
                        onclick="showOutcomeForm()">+
                        Tambah Pemasukan</button>
                </div>
                <div class="p-3 bg-white bg-opacity-40 w-full lg:w-1/3 rounded-lg">
                    <a href="pengeluaran"> <button class="font-medium text-gray-500">Pengeluaran</button></a>
                    <h1 class="font-bold text-2xl pb-1 formatUang">{{ $pengeluarans->sum('nominalPengeluaran') }}</h1>
                    <button
                        class="text-gray-500 text-sm text-center align-middle bg-white border-2 border-gray-300 rounded-full px-2"
                        onclick="showIncomeForm()">+
                        Tambah Pengeluaran</button>
                </div>
                <div class="p-3 bg-white bg-opacity-40 w-full lg:w-1/3 rounded-lg">
                    <a href="tabungan"> <button class="font-medium text-gray-500">Tabungan</button></a>
                    <h1 class="font-bold text-2xl pb-1 formatUang">{{ $tabungans->sum('jumlahTabungan') }}</h1>
                    <button
                        class="text-gray-500 text-sm text-center align-middle bg-white border-2 border-gray-300 rounded-full px-2"
                        onclick="showTabunganForm()">+
                        Tambah Tabungan</button>
                </div>
            </div>
            <div>
                <div class="pb-4">
                    @if (!$tabungans->count())
                        <h1 class="text-2xl text-slate-800 font-bold ms-4 mt-5">Belum ada tabungan dibuat</h1>
                    @else
                        <div class="p-3 bg-white bg-opacity-50 rounded-t-lg">
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 py-4 px-6">
                                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                        <div class="flex w-full justify-between overflow-hidden">
                                            <div class="flex flex-col">
                                                <h1 class="text-sm font-medium text-gray-400">Laptop</h1>
                                                <h1 class="text-2xl font-bold"> Rp 20.000.000</h1>
                                            </div>
                                            <div class="p-3">
                                                <img src="img/10persen.svg">
                                            </div>
                                            <div
                                                class="flex flex-col font-bold p-3 border-dashed border-l-4 border-gray-300">
                                                <h1 class="pl-4">Date Created</h1>
                                                <h1 class="pl-4">Estimation</h1>
                                            </div>
                                            <div class="flex flex-col p-3">
                                                <h1> 30 Oktober 2023</h1>
                                                <h1> 9 Bulan lagi</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 bg-white rounded-b-lg">
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 py-4 px-20">
                                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                        <div class="flex w-full justify-between text-center overflow-hidden">
                                            <div class="flex flex-col">
                                                <h1 class="text-sm font-medium">Total Tabungan</h1>
                                                <h1 class="text-2xl font-bold text-green-500"> Rp 20.000.000</h1>
                                            </div>
                                            <div class="flex flex-col">
                                                <h1 class="text-sm font-medium">Sisa</h1>
                                                <h1 class="text-2xl font-bold text-red-500"> Rp 20.000.000</h1>
                                            </div>
                                            <div class="flex">
                                                <button id="tambahButton" class="p-5">
                                                    <img src="img/tambaht.svg" alt="logo">
                                                </button>
                                                <a href="#" class="flex items-center">
                                                    <img src="img/hapust.svg" alt="logo" class="p-5">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="p-3 bg-white bg-opacity-50 rounded-lg lg:w-1/4">
            <h1 class="font-bold text-center">Riwayat</h1>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 p-3">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <tbody>
                                <tr>
                                    <td><img src="img/Up.svg"></td>
                                    <td class="px-4 py-4 text-lg font-normal">Rp 5.000.000</td>
                                </tr>
                                <tr>
                                    <td><img src="img/Down.svg"></td>
                                    <td class="px-4 py-4 text-lg font-normal">Rp 5.000.000</td>
                                </tr>
                                <tr>
                                    <td><img src="img/Plus.svg"></td>
                                    <td class="px-4 py-4 text-lg font-normal">Rp 5.000.000</td>
                                </tr>
                                <tr>
                                    <td><img src="img/Up.svg"></td>
                                    <td class="px-4 py-4 text-lg font-normal">Rp 5.000.000</td>
                                </tr>
                                <tr>
                                    <td><img src="img/Down.svg"></td>
                                    <td class="px-4 py-4 text-lg font-normal">Rp 5.000.000</td>
                                </tr>
                                <tr>
                                    <td><img src="img/Up.svg"></td>
                                    <td class="px-4 py-4 text-lg font-normal">Rp 5.000.000</td>
                                </tr>
                                <tr>
                                    <td><img src="img/Down.svg"></td>
                                    <td class="px-4 py-4 text-lg font-normal">Rp 5.000.000</td>
                                </tr>
                                <tr>
                                    <td><img src="img/Plus.svg"></td>
                                    <td class="px-4 py-4 text-lg font-normal">Rp 5.000.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay and income form popup -->
    <div class="overlay" id="incomeFormOverlay">
        <div class="bg-white px-5 py-5 border rounded">
            <form>
                <div class="mb-4">
                    <label for="tanggal" class="block font-semibold text-sm pb-1">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal"
                        class="border bg-gray-200 px-2 py-1 rounded w-full">
                </div>
                <div class="mb-4">
                    <label for="jumlah" class="block font-semibold text-sm pb-1">Jumlah</label>
                    <input type="text" id="jumlah" name="jumlah" class="border bg-gray-200 px-2 py-1 rounded ">
                </div>
                <div class="mb-4">
                    <label for="keterangan" class="block font-semibold text-sm pb-1">Keterangan</label>
                    <input id="keterangan" name="keterangan" class="border bg-gray-200 px-2 py-1 rounded">
                </div>
                <div class="flex gap-2">
                    <button type="button" class="bg-blue-800 text-white font-semibold px-4 py-2 rounded w-full text-sm"
                        onclick="saveIncome()">Simpan</button>
                    <button type="button" class="bg-cyan-600 text-white font-semibold px-4 py-2 rounded w-full text-sm"
                        onclick="hideIncomeForm()">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showIncomeForm() {
            // Menampilkan overlay dan formulir pemasukan
            document.getElementById('incomeFormOverlay').style.display = 'flex';
        }

        function hideIncomeForm() {
            // Menyembunyikan overlay dan formulir pemasukan
            document.getElementById('incomeFormOverlay').style.display = 'none';
        }

        function saveIncome() {
            // Tambahkan logika penyimpanan pemasukan di sini
            // Misalnya, Anda dapat mengambil nilai formulir dan melakukan sesuatu dengan data tersebut
            // Setelah penyimpanan berhasil, sembunyikan overlay dan formulir pemasukan
            hideIncomeForm();
        }
    </script>

    <!-- Overlay and outcome form popup -->
    <div class="overlay" id="outcomeFormOverlay">
        <div class="bg-white px-5 py-5 border rounded">
            <form>
                <div class="mb-4">
                    <label for="tanggal" class="block font-semibold text-sm pb-1">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal"
                        class="border bg-gray-200 px-2 py-1 rounded w-full">
                </div>
                <div class="mb-4">
                    <label for="jumlah" class="block font-semibold text-sm pb-1">Jumlah</label>
                    <input type="text" id="jumlah" name="jumlah" class="border bg-gray-200 px-2 py-1 rounded ">
                </div>
                <div class="mb-4">
                    <label for="keterangan" class="block font-semibold text-sm pb-1">Keterangan</label>
                    <input id="keterangan" name="keterangan" class="border bg-gray-200 px-2 py-1 rounded">
                </div>
                <div class="flex gap-2">
                    <button type="button" class="bg-blue-800 text-white font-semibold px-4 py-2 rounded w-full text-sm"
                        onclick="saveOutcome()">Simpan</button>
                    <button type="button" class="bg-cyan-600 text-white font-semibold px-4 py-2 rounded w-full text-sm"
                        onclick="hideOutcomeForm()">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showOutcomeForm() {
            // Menampilkan overlay dan formulir pemasukan
            document.getElementById('outcomeFormOverlay').style.display = 'flex';
        }

        function hideOutcomeForm() {
            // Menyembunyikan overlay dan formulir pemasukan
            document.getElementById('outcomeFormOverlay').style.display = 'none';
        }

        function saveOutcome() {
            // Tambahkan logika penyimpanan pemasukan di sini
            // Misalnya, Anda dapat mengambil nilai formulir dan melakukan sesuatu dengan data tersebut
            // Setelah penyimpanan berhasil, sembunyikan overlay dan formulir pemasukan
            hideOutcomeForm();
        }
    </script>

    <!-- Overlay and tabungan form popup -->
    <div class="overlay" id="tabunganFormOverlay">
        <div class="bg-white px-5 py-5 border rounded">
            <form>
                <div class="mb-4">
                    <label for="namaTabungan" class="block font-semibold text-sm pb-1">Nama Tabungan</label>
                    <input type="text" id="namaTabungan" name="namaTabungan"
                        class="border bg-gray-200 px-2 py-1 rounded">
                </div>
                <div class="mb-4">
                    <label for="targetTabungan" class="block font-semibold text-sm pb-1">Target Tabungan</label>
                    <input type="text" id="targetTabungan" name="targetTabungan"
                        class="border bg-gray-200 px-2 py-1 rounded">
                </div>
                <div class="mb-4">
                    <label for="rencanaPengisian" class="block font-semibold text-sm pb-1">Rencana Pengisian</label>
                    <select id="rencanaPengisian" name="rencanaPengisian"
                        class="border bg-gray-200 px-2 py-1 rounded w-full">
                        <option value="bulanan">Bulanan</option>
                        <option value="tahunan">Tahunan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="nominalPengisian" class="block font-semibold text-sm pb-1">Nominal Pengisian</label>
                    <input type="text" id="nominalPengisian" name="nominalPengisian"
                        class="border bg-gray-200 px-2 py-1 rounded">
                </div>
                <div class="flex gap-2">
                    <button type="button" class="bg-blue-800 text-white font-semibold px-4 py-2 rounded w-full text-sm"
                        onclick="saveTabungan()">Simpan</button>
                    <button type="button" class="bg-cyan-600 text-white font-semibold px-4 py-2 rounded w-full text-sm"
                        onclick="hideTabunganForm()">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showTabunganForm() {
            // Menampilkan overlay dan formulir tabungan
            document.getElementById('tabunganFormOverlay').style.display = 'flex';
        }

        function hideTabunganForm() {
            // Menyembunyikan overlay dan formulir tabungan
            document.getElementById('tabunganFormOverlay').style.display = 'none';
        }

        function saveTabungan() {
            // Tambahkan logika penyimpanan tabungan di sini
            // Misalnya, Anda dapat mengambil nilai formulir dan melakukan sesuatu dengan data tersebut
            // Setelah penyimpanan berhasil, sembunyikan overlay dan formulir tabungan
            hideTabunganForm();
        }
    </script>

    <div id="popupForm" class="overlay">
        <div class="confirmation-box">
            <form class="mb-4">
                <!-- Isi form sesuai kebutuhan -->
                <label for="nominal" class="block font-semibold text-sm pb-1">Nominal Pengisian</label>
                <input type="text" id="nominal" name="nominal" required
                    class="border bg-gray-200 px-2 py-1 rounded">

                <div class="flex gap-2 mt-2">
                    <button type="button" id="tambahNominalButton"
                        class="bg-blue-800 text-white font-semibold px-4 py-2 rounded w-full text-sm">Tambah</button>
                    <button type="button" id="batalButton"
                        class="bg-cyan-600 text-white font-semibold px-4 py-2 rounded w-full text-sm">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById("tambahButton").addEventListener("click", function() {
            document.getElementById("popupForm").style.display = "flex";
        });

        document.getElementById("tambahNominalButton").addEventListener("click", function() {
            // Tambahan logika untuk menangani penambahan nominal
            // Misalnya, dapat ditambahkan logika AJAX untuk mengirim data ke server
            alert("Nominal ditambahkan!");
            document.getElementById("popupForm").style.display = "none";
        });

        document.getElementById("batalButton").addEventListener("click", function() {
            document.getElementById("popupForm").style.display = "none";
        });
    </script>
@endsection
