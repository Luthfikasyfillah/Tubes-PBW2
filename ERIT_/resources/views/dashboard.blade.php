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

    <div class="flex flex-col md:flex-row ml-28 mr-12 pt-8 gap-4">
        <div class="flex flex-col lg:w-3/4">
            <div class="flex flex-col lg:flex-row gap-5 justify-left items-start w-full pb-4">
                <div class="cursor-pointer p-3 bg-slate-100 w-full lg:w-1/3 rounded-lg cardJenis cardPemasukan bg-blue-800">
                    <a href="#"> <button class="font-medium titleCard text-slate-200">Pemasukan</button></a>
                    <h1 class="font-bold text-2xl pb-1 formatUang text-white">
                        {{ $pemasukans->sum('nominalPemasukan') - $pengeluarans->sum('nominalPengeluaran') }}</h1>
                    <button
                        class="text-gray-500 text-sm text-center align-middle bg-white border-2 border-gray-300 rounded-full px-2"
                        onclick="showIncomeForm()">+
                        Tambah Pemasukan</button>
                </div>
                <div class="cursor-pointer p-3 bg-slate-100 w-full lg:w-1/3 rounded-lg cardJenis cardPengeluaran">
                    <a href="#"> <button class="font-medium titleCard text-gray-500">Pengeluaran</button></a>
                    <h1 class="font-bold text-2xl pb-1 formatUang">{{ $pengeluarans->sum('nominalPengeluaran') }}</h1>
                    <button
                        class="text-gray-500 text-sm text-center align-middle bg-white border-2 border-gray-300 rounded-full px-2"
                        onclick="showOutcomeForm()">+
                        Tambah Pengeluaran</button>
                </div>
                <div class="cursor-pointer p-3 bg-slate-100 w-full lg:w-1/3 rounded-lg cardJenis cardTabungan">
                    <a href="#"> <button class="font-medium titleCard text-gray-500">Tabungan</button></a>
                    <h1 class="font-bold text-2xl pb-1 formatUang">{{ $tabungans->sum('jumlahTabungan') }}</h1>
                    <button
                        class="text-gray-500 text-sm text-center align-middle bg-white border-2 border-gray-300 rounded-full px-2"
                        onclick="showTabunganForm()">+
                        Tambah Tabungan</button>
                </div>
            </div>

            @if (!$pemasukans->count())
                <h1 class="atributPemasukan text-2xl text-slate-800 font-bold ms-4 mt-5">Tidak ada riwayat pemasukan</h1>
            @else
                <div class="atributPemasukan p-3 bg-white bg-opacity-50 rounded-lg">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 p-3">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <h1 class="text-2xl font-bold ms-4">Pemasukan</h1>
                                    <table class="min-w-full text-left text-sm font-light">
                                        <thead class="border-b-2 font-medium">
                                            <tr>
                                                <th scope="col" class="px-4 py-4">Keterangan</th>
                                                <th scope="col" class="px-4 py-4">Tanggal</th>
                                                <th scope="col" class="px-4 py-4">Jumlah</th>
                                                <th scope="col" class="px-4 py-4"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pemasukans as $pemasukan)
                                                <tr class="border-b-2 ">
                                                    <td class="px-4 py-4 font-normal">{{ $pemasukan->keterangan }}</td>
                                                    <td class="px-4 py-4 font-normal">
                                                        {{ Carbon\Carbon::parse($pemasukan->tanggal)->translatedFormat('d M Y') }}
                                                    </td>
                                                    <td class="px-4 py-4 font-normal formatUang">
                                                        {{ $pemasukan->nominalPemasukan }}
                                                    </td>
                                                    <td class="px-4 py-4">
                                                        <button
                                                            class="bg-gray-300 px-2 rounded-full font-semibold text-white"
                                                            onclick="showConfirmation({{ $pemasukan->idPemasukan }}, 'pemasukan')">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (!$pengeluarans->count())
                <h1 class="atributPengeluaran hidden text-2xl text-slate-800 font-bold ms-4 mt-5">Tidak ada riwayat
                    pengeluaran</h1>
            @else
                <div class="atributPengeluaran hidden p-3 bg-white bg-opacity-50 rounded-lg">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 p-3">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <h1 class="text-2xl font-bold ms-4">Pengeluaran</h1>
                                    <table class="min-w-full text-left text-sm font-light">
                                        <thead class="border-b-2 font-medium">
                                            <tr>
                                                <th scope="col" class="px-4 py-4">Keterangan</th>
                                                <th scope="col" class="px-4 py-4">Tanggal</th>
                                                <th scope="col" class="px-4 py-4">Jumlah</th>
                                                <th scope="col" class="px-4 py-4"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengeluarans as $pengeluaran)
                                                <tr class="border-b-2 ">
                                                    <td class="px-4 py-4 font-normal">{{ $pengeluaran->keterangan }}</td>
                                                    <td class="px-4 py-4 font-normal">
                                                        {{ Carbon\Carbon::parse($pengeluaran->tanggal)->translatedFormat('d M Y') }}
                                                    </td>
                                                    <td class="px-4 py-4 font-normal formatUang">
                                                        {{ $pengeluaran->nominalPengeluaran }}
                                                    </td>
                                                    <td class="px-4 py-4">
                                                        <button
                                                            class="bg-gray-300 px-2 rounded-full font-semibold text-white"
                                                            onclick="showConfirmation({{ $pengeluaran->idPengeluaran }}, 'pengeluaran')">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- TABLE TABUNGAN --}}
            <div class="pb-4 mt-4 atributTabungan hidden">
                @if (!$tabungans->count())
                    <h1 class="text-2xl text-slate-800 font-bold ms-4 mt-5">Belum ada tabungan dibuat</h1>
                @else
                    @foreach ($tabungans as $tabungan)
                        <div class="mb-5">
                            <div class="p-3 bg-white bg-opacity-50 rounded-t-lg">
                                <div class="flex flex-col">
                                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 py-4 px-6">
                                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                            <div class="flex w-full justify-between overflow-hidden">
                                                <div class="flex flex-col">
                                                    <h1 class="text-sm font-medium text-gray-400">
                                                        {{ $tabungan->namaTabungan }}</h1>
                                                    <h1 class="text-2xl font-bold formatUang">
                                                        {{ $tabungan->targetTabungan }}</h1>
                                                </div>
                                                <div class="p-3">
                                                    <div class="progress-bar">
                                                        {{ $tabungan->jumlahTabungan != 0 ? number_format(($tabungan->jumlahTabungan * 100) / $tabungan->targetTabungan, 1) : 0 }}%
                                                    </div>
                                                    {{-- <img src="img/10persen.svg"> --}}
                                                </div>
                                                <div
                                                    class="flex flex-col font-bold p-3 border-dashed border-l-4 border-gray-300">
                                                    <h1 class="pl-4">Tanggal Dibuat</h1>
                                                    <h1 class="pl-4">Nominal Perbulan</h1>
                                                    @if ($tabungan->jumlahTabungan < $tabungan->targetTabungan)
                                                        <h1 class="pl-4">Estimasi Selesai</h1>
                                                    @else
                                                        <h1 class="pl-4 text-green-500">Selesai</h1>
                                                    @endif
                                                </div>
                                                <div class="flex flex-col p-3">
                                                    <h1>{{ Carbon\Carbon::parse($tabungan->created_at)->translatedFormat('d M Y') }}
                                                    </h1>
                                                    <h1 class="formatUang">{{ $tabungan->nominalPengisian }}</h1>
                                                    @if ($tabungan->jumlahTabungan < $tabungan->targetTabungan)
                                                        <h1>{{ ($tabungan->targetTabungan - $tabungan->jumlahTabungan) / $tabungan->nominalPengisian . ' ' . substr($tabungan->rencanaPengisian, 0, -2) }}
                                                        </h1>
                                                    @endif
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
                                                    <h1 class="text-2xl font-bold text-green-500 formatUang">
                                                        {{ $tabungan->jumlahTabungan }}</h1>
                                                </div>
                                                <div class="flex flex-col">
                                                    <h1 class="text-sm font-medium">Sisa</h1>
                                                    <h1 class="text-2xl font-bold text-red-500 formatUang">
                                                        {{ $tabungan->targetTabungan - $tabungan->jumlahTabungan }}</h1>
                                                </div>
                                                <div class="flex">
                                                    @if ($tabungan->jumlahTabungan < $tabungan->targetTabungan)
                                                        <button id="tambahButton" class="p-5"
                                                            onclick="showTambah({{ $tabungan->idTabungan }}, {{ $tabungan->nominalPengisian }}, '{{ $tabungan->namaTabungan }}')">
                                                            <img src="img/tambaht.svg" alt="logo">
                                                        </button>
                                                    @endif
                                                    <a href="#" class="flex items-center"
                                                        onclick="showConfirmation({{ $tabungan->idTabungan }}, 'tabungan')">
                                                        <img src="img/hapust.svg" alt="logo" class="p-5">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        {{-- RIWAYAT --}}
        <div class="p-3 bg-white bg-opacity-50 rounded-lg lg:w-1/4">
            <h1 class="font-bold text-center">Riwayat</h1>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 p-3">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <tbody>
                                @foreach ($riwayats as $riwayat)
                                    <tr>
                                        @if ($riwayat->idPemasukan)
                                            <td><img src="img/Up.svg" class="rotate-180"></td>
                                            <td class="px-4 py-4 text-lg font-normal formatUang">{{ $riwayat->pemasukan->nominalPemasukan }}</td>
                                        @elseif ($riwayat->idPengeluaran)
                                            <td><img src="img/Down.svg" class="rotate-180"></td>
                                            <td class="px-4 py-4 text-lg font-normal formatUang">{{ $riwayat->pengeluaran->nominalPengeluaran }}</td>
                                        @else
                                            <td><img src="img/Plus.svg" class="rotate-180"></td>
                                            <td class="px-4 py-4 text-lg font-normal formatUang">{{ $riwayat->nominalTabungan }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- delete popup -->
    <div class="overlay" id="confirmationOverlay">
        <div class="confirmation-box px-12">
            <p class="mb-4 font-semibold">Anda yakin akan menghapus data ini?</p>
            <button class="bg-cyan-600 text-white px-6 py-1 rounded" onclick="hideConfirmation()">Tidak</button>
            <form id="formHapus" action="" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-blue-800 text-white px-6 py-1 mr-2 rounded"
                    onclick="deleteItem()">Ya</button>
            </form>
        </div>
    </div>

    <!-- tambah tabungan popup -->
    <div class="overlay" id="tambahOverlay">
        <div class="confirmation-box px-12">
            <p class="mb-4 font-semibold teksTambah"></p>
            <button class="bg-cyan-600 text-white px-6 py-1 rounded" onclick="hideTambah()">Tidak</button>
            <form id="formTambah" action="" method="POST" class="inline">
                @csrf
                @method('PUT')
                <input type="hidden" value="" name="nominalPengisian" class="confirmNominalPengisian">
                <button type="submit" class="bg-blue-800 text-white px-6 py-1 mr-2 rounded">Ya</button>
            </form>
        </div>
    </div>

    <script>
        function showConfirmation(id, jenis) {
            // Menampilkan overlay dan kotak konfirmasi
            console.log(id);
            const form = document.getElementById('formHapus') || null;
            if (form) {
                if (jenis == 'pemasukan') {
                    form.action = "pemasukan/" + id;
                } else if (jenis == 'pengeluaran') {
                    form.action = "pengeluaran/" + id;
                } else if (jenis == 'tabungan') {
                    form.action = "tabungan/" + id;
                }
            }
            document.getElementById('confirmationOverlay').style.display = 'flex';
        }

        function showTambah(id, nominal, nama) {
            const ubahUang = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 2
            })
            const uang = ubahUang.format(nominal)
            document.querySelector('.teksTambah').innerHTML = 'Tambahkan ' + uang + ' ke tabungan ' + nama + '?';
            const form = document.getElementById('formTambah') || null;
            if (form) {
                document.querySelector('.confirmNominalPengisian').value = nominal
                form.action = "tabungan/" + id;
            }
            document.getElementById('tambahOverlay').style.display = 'flex';
        }

        function hideConfirmation() {
            document.getElementById('tambahOverlay').style.display = 'none';
        }

        function hideConfirmation() {
            // Menyembunyikan overlay dan kotak konfirmasi
            document.getElementById('confirmationOverlay').style.display = 'none';
        }

        function deleteItem() {
            // Tambahkan logika penghapusan di sini
            // Misalnya, Anda dapat membuat permintaan AJAX ke server untuk menghapus item
            // Setelah penghapusan berhasil, sembunyikan overlay dan kotak konfirmasi
            hideConfirmation();
        }
    </script>

    <!-- OVERLAY PEMASUKAN -->
    <div class="overlay" id="incomeFormOverlay">
        <div class="bg-white px-5 py-5 border rounded">
            <h3 class="font-bold">Tambah Pemasukan</h3>
            <hr class="my-2">
            <form action="{{ route('pemasukan.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="tanggal" class="block font-semibold text-sm pb-1">Tanggal</label>
                    <input required type="date" id="tanggal" name="tanggal"
                        class="border bg-gray-200 px-2 py-1 rounded w-full">
                </div>
                <div class="mb-4">
                    <label for="nominalPemasukan" class="block font-semibold text-sm pb-1">Nominal</label>
                    <input required type="number" id="nominalPemasukan" name="nominalPemasukan"
                        class="border bg-gray-200 px-2 py-1 rounded ">
                </div>
                <div class="mb-4">
                    <label for="keterangan" class="block font-semibold text-sm pb-1">Keterangan</label>
                    <input required id="keterangan" name="keterangan" class="border bg-gray-200 px-2 py-1 rounded">
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="bg-blue-800 text-white font-semibold px-4 py-2 rounded w-full text-sm"
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

    <!-- OVERLAY PENGELUARAN -->
    <div class="overlay" id="outcomeFormOverlay">
        <div class="bg-white px-5 py-5 border rounded">
            <h3 class="font-bold">Tambah Pengeluaran</h3>
            <hr class="my-2">
            <form action="{{ route('pengeluaran.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="tanggal" class="block font-semibold text-sm pb-1">Tanggal</label>
                    <input required type="date" id="tanggal" name="tanggal"
                        class="border bg-gray-200 px-2 py-1 rounded w-full">
                </div>
                <div class="mb-4">
                    <label for="nominalPengeluaran" class="block font-semibold text-sm pb-1">Nominal</label>
                    <input required type="number" id="nominalPengeluaran" name="nominalPengeluaran"
                        class="border bg-gray-200 px-2 py-1 rounded ">
                </div>
                <div class="mb-4">
                    <label for="keterangan" class="block font-semibold text-sm pb-1">Keterangan</label>
                    <select required id="keterangan" name="keterangan"
                        class="border bg-gray-200 px-2 py-1 rounded w-full">
                        <option value="makan">Makan</option>
                        <option value="tagihan">Tagihan</option>
                        <option value="transportasi">Transportasi</option>
                        <option value="hiburan">Hiburan</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
                {{-- <div class="mb-4">
                    <label for="keterangan" class="block font-semibold text-sm pb-1">Keterangan</label>
                    <input required id="keterangan" name="keterangan" class="border bg-gray-200 px-2 py-1 rounded">
                </div> --}}
                <div class="flex gap-2">
                    <button type="submit" class="bg-blue-800 text-white font-semibold px-4 py-2 rounded w-full text-sm"
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

    <!-- OVERLAY TABUNGAN -->
    <div class="overlay" id="tabunganFormOverlay">
        <div class="bg-white px-5 py-5 border rounded">
            <h3 class="font-bold">Tambah Tabungan</h3>
            <hr class="my-2">
            <form action="{{ route('tabungan.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="namaTabungan" class="block font-semibold text-sm pb-1">Nama Tabungan</label>
                    <input required type="text" id="namaTabungan" name="namaTabungan"
                        class="border bg-gray-200 px-2 py-1 rounded">
                </div>
                <div class="mb-4">
                    <label for="targetTabungan" class="block font-semibold text-sm pb-1">Target Tabungan</label>
                    <input required type="text" id="targetTabungan" name="targetTabungan"
                        class="border bg-gray-200 px-2 py-1 rounded">
                </div>
                <div class="mb-4">
                    <label for="rencanaPengisian" class="block font-semibold text-sm pb-1">Rencana Pengisian</label>
                    <select required id="rencanaPengisian" name="rencanaPengisian"
                        class="border bg-gray-200 px-2 py-1 rounded w-full">
                        <option value="mingguan">Mingguan</option>
                        <option value="bulanan">Bulanan</option>
                        <option value="tahunan">Tahunan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="nominalPengisian" class="block font-semibold text-sm pb-1">Nominal Pengisian</label>
                    <input required type="text" id="nominalPengisian" name="nominalPengisian"
                        class="border bg-gray-200 px-2 py-1 rounded">
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="bg-blue-800 text-white font-semibold px-4 py-2 rounded w-full text-sm"
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

        document.querySelectorAll('.progress-bar').forEach(function(el) {
            const persen = el.innerHTML
            el.style.background =
                'radial-gradient(closest-side, white 79%, transparent 80% 100%),conic-gradient(#10b981 ' + persen +
                ', #b3e6d5 0)'
        });
    </script>
@endsection
