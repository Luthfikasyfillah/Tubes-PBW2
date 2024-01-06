@extends('layout.app')

@section('content')
    <div class="flex flex-col md:flex-row items-start ml-28 mr-12">
        <div class="mb-4 lg:mb-0">
            <div class="font-bold text-2xl">Hai, Cipung!</div>
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
        <div class="flex flex-col lg:w-3/4">
            <div class="pb-5">
                <div class="font-bold text-white bg-cyan-600 w-44 text-center rounded-md p-2">
                    Grafik Pengeluaran
                </div>
            </div>
            <div class="p-5">
                <img src="img/Group.svg">
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
@endsection
