@extends('layout.app')

@section('content')
    <div class="flex flex-col md:flex-row items-start ml-28 mr-12">
        <div class="mb-4 lg:mb-0">
            <div class="font-bold text-2xl">Hai, {{ Auth::user()->name }}!</div>
            <div class="font-medium text-gray-500">Bagaimana Kabarmu Hari Ini?</div>
        </div>
        <div class="flex-grow"></div>
        <div class="flex p-3 gap-3 justify-center items-center bg-white bg-opacity-50 rounded-lg">
            <img src="img/kalender.svg" class="h-6 w-6">
            <div class="font-bold text-sm">24 Juli 2023</div>
            <div class="font-bold text-sm">07:24 PM</div>
        </div>
    </div>
    <div class="flex flex-col md:flex-row ml-28 mr-12 pt-8 gap-5">
        <div class="flex gap-20 lg:w-3/4 pe-20">
            <div class="pb-5">
                <div class="font-bold text-white bg-cyan-600 w-44 text-center rounded-md p-2 mb-10">
                    Grafik Pengeluaran
                </div>
                <div class="circle-chart"></div>
                <div class="flex items-center gap-4 mt-12">
                    <div class="rectangle bg-[#00B4FF] m-0 p-0" style="width:15px; height:15px;"></div>
                    <p class="m-0 p-0 font-bold">Makan</p>
                    <p class="m-0 p-0 font-bold ms-auto text-right grow">
                        {{ number_format(($makans->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}%
                    </p>
                </div>
                <div class="flex items-center gap-4 mt-2">
                    <div class="rectangle bg-[#0078FF] m-0 p-0" style="width:15px; height:15px;"></div>
                    <p class="m-0 p-0 font-bold">Tagihan</p>
                    <p class="m-0 p-0 font-bold ms-auto text-right grow">
                        {{ number_format(($tagihans->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}%
                    </p>
                </div>
                <div class="flex items-center gap-4 mt-2">
                    <div class="rectangle bg-[#FF004B] m-0 p-0" style="width:15px; height:15px;"></div>
                    <p class="m-0 p-0 font-bold">Transportasi</p>
                    <p class="m-0 p-0 font-bold ms-auto text-right grow">
                        {{ number_format(($transportasis->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}%
                    </p>
                </div>
                <div class="flex items-center gap-4 mt-2">
                    <div class="rectangle bg-[#FFAF00] m-0 p-0" style="width:15px; height:15px;"></div>
                    <p class="m-0 p-0 font-bold">Hiburan</p>
                    <p class="m-0 p-0 font-bold ms-auto text-right grow">
                        {{ number_format(($hiburans->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}%
                    </p>
                </div>
                <div class="flex items-center gap-4 mt-2">
                    <div class="rectangle bg-[#FFE100] m-0 p-0" style="width:15px; height:15px;"></div>
                    <p class="m-0 p-0 font-bold">Lainnya</p>
                    <p class="m-0 p-0 font-bold ms-auto text-right grow">
                        {{ number_format(($lainnyas->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}%
                    </p>
                </div>
            </div>
            <div class="pb-5 grow">
                <div class="bg-white rounded-md p-3 mb-5">
                    <p class="font-bold">Makan</p>
                    <div class="flex items-center gap-6">
                        <div class="bg-[#D9D9D9] w-[70%] rounded-full">
                            <p class="persenMakan" hidden>
                                {{ number_format(($makans->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}
                            </p>
                            <div class="bg-[#00B4FF] rounded-full"
                                style="width:{{ number_format(($makans->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}%; height: 6px">
                            </div>
                        </div>
                        <small class="shrink-0 formatUang">{{ $makans->sum('nominalPengeluaran') }}</small>
                    </div>
                </div>
                <div class="bg-white rounded-md p-3 mb-5">
                    <p class="font-bold">Tagihan</p>
                    <div class="flex items-center gap-6">
                        <div class="bg-[#D9D9D9] w-[70%] rounded-full">
                            <p class="persenTagihan" hidden>
                                {{ number_format(($tagihans->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}
                            </p>
                            <div class="bg-[#0078FF] rounded-full"
                                style="width:{{ number_format(($tagihans->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}%; height: 6px">
                            </div>
                        </div>
                        <small class="shrink-0 formatUang">{{ $tagihans->sum('nominalPengeluaran') }}</small>
                    </div>
                </div>
                <div class="bg-white rounded-md p-3 mb-5">
                    <p class="font-bold">Transportasi</p>
                    <div class="flex items-center gap-6">
                        <div class="bg-[#D9D9D9] w-[70%] rounded-full">
                            <p class="persenTransportasi" hidden>
                                {{ number_format(($transportasis->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}
                            </p>
                            <div class="bg-[#FF004B] rounded-full"
                                style="width:{{ number_format(($transportasis->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}%; height: 6px">
                            </div>
                        </div>
                        <small class="shrink-0 formatUang">{{ $transportasis->sum('nominalPengeluaran') }}</small>
                    </div>
                </div>
                <div class="bg-white rounded-md p-3 mb-5">
                    <p class="font-bold">Hiburan</p>
                    <div class="flex items-center gap-6">
                        <div class="bg-[#D9D9D9] w-[70%] rounded-full">
                            <p class="persenHiburan" hidden>
                                {{ number_format(($hiburans->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}
                            </p>
                            <div class="bg-[#FFAF00] rounded-full"
                                style="width:{{ number_format(($hiburans->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}%; height: 6px">
                            </div>
                        </div>
                        <small class="shrink-0 formatUang">{{ $hiburans->sum('nominalPengeluaran') }}</small>
                    </div>
                </div>
                <div class="bg-white rounded-md p-3 mb-5">
                    <p class="font-bold">Lainnya</p>
                    <div class="flex items-center gap-6">
                        <div class="bg-[#D9D9D9] w-[70%] rounded-full">
                            <p class="persenLainnya" hidden>
                                {{ number_format(($lainnyas->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}
                            </p>
                            <div class="bg-[#FFE100] rounded-full"
                                style="width:{{ number_format(($lainnyas->sum('nominalPengeluaran') * 100) / $pengeluarans->sum('nominalPengeluaran'), 1) }}%; height: 6px">
                            </div>
                        </div>
                        <small class="shrink-0 formatUang">{{ $lainnyas->sum('nominalPengeluaran') }}</small>
                    </div>
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
                                @foreach ($riwayats as $riwayat)
                                    <tr>
                                        @if ($riwayat->idPemasukan)
                                            <td><img src="img/Up.svg" class="rotate-180"></td>
                                            <td class="px-4 py-4 text-lg font-normal formatUang">
                                                {{ $riwayat->pemasukan->nominalPemasukan }}</td>
                                        @elseif ($riwayat->idPengeluaran)
                                            <td><img src="img/Down.svg" class="rotate-180"></td>
                                            <td class="px-4 py-4 text-lg font-normal formatUang">
                                                {{ $riwayat->pengeluaran->nominalPengeluaran }}</td>
                                        @else
                                            <td><img src="img/Plus.svg" class="rotate-180"></td>
                                            <td class="px-4 py-4 text-lg font-normal formatUang">
                                                {{ $riwayat->nominalTabungan }}</td>
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
    <script>
        document.querySelectorAll('.progress-bar').forEach(function(el) {
            const persen = '70%'
            el.style.background =
                'radial-gradient(closest-side, #EAEBF0 79%, transparent 80% 100%),conic-gradient(#10b981 ' +
                persen + ', #b3e6d5 0)'
        });

        const persenMakan = parseInt(document.querySelector('.persenMakan').innerHTML);
        const persenTagihan = parseInt(document.querySelector('.persenTagihan').innerHTML);
        const persenTransportasi = parseInt(document.querySelector('.persenTransportasi').innerHTML);
        const persenHiburan = parseInt(document.querySelector('.persenHiburan').innerHTML);
        const persenLainnya = parseInt(document.querySelector('.persenLainnya').innerHTML);

        const persenTagihan2 = persenMakan+persenTagihan;
        const persenTransportasi2 = persenMakan+persenTagihan+persenTransportasi
        const persenHiburan2 = persenMakan+persenTagihan+persenTransportasi+persenHiburan
        const persenLainnya2 = persenMakan+persenTagihan+persenTransportasi+persenHiburan+persenLainnya

        document.querySelector('.circle-chart').style.background =
            'conic-gradient(#00B4FF 0% ' + persenMakan + '%,#0078FF ' + persenMakan + '% ' + persenTagihan2 + '%,#FF004B ' +
            persenTagihan2 + '% ' + persenTransportasi2 + '%,#FFAF00 ' + persenTransportasi2 + '% ' + persenHiburan2 +
            '%, #FFE100 ' + persenHiburan2 + '% 100%)';
    </script>
@endsection
