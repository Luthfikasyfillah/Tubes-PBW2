<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class duitController extends Controller
{
    public function index($url)
    {
        return view($url, [
            'pemasukans' => Pemasukan::latest()->get(),
            'pengeluarans' => Pengeluaran::latest()->get(),
            'tabungans' => Tabungan::latest()->get(),
            'riwayats' => Riwayat::latest()->get(),
            'makans' => Pengeluaran::where('keterangan', 'makan')->get(),
            'tagihans' => Pengeluaran::where('keterangan', 'tagihan')->get(),
            'transportasis' => Pengeluaran::where('keterangan', 'transportasi')->get(),
            'hiburans' => Pengeluaran::where('keterangan', 'hiburan')->get(),
            'lainnyas' => Pengeluaran::where('keterangan', 'lainnya')->get(),
        ]);
    }

    // PEMASUKAN
    public function pemasukanStore()
    {
        $pemasukan = Pemasukan::create([
            'idUser' => Auth::id(),
            'tanggal' => request('tanggal'),
            'nominalPemasukan' => request('nominalPemasukan'),
            'keterangan' => request('keterangan'),
        ]);
        // dd($pemasukan->idPemasukan);
        Riwayat::create([
            'idPemasukan' => $pemasukan->idPemasukan,
        ]);
        return redirect()->back()->with("successPemasukan", "Berhasil menambahkan pemasukan");
    }

    public function pemasukanDelete($id)
    {
        $pemasukan = Pemasukan::find($id);
        $pemasukan->delete();
        return redirect()->back()->with("successPemasukan", "Pemasukan telah dihapus");
    }

    // PENGELUARAN
    public function pengeluaranStore()
    {
        $pengeluaran = Pengeluaran::create([
            'idUser' => Auth::id(),
            'tanggal' => request('tanggal'),
            'nominalPengeluaran' => request('nominalPengeluaran'),
            'keterangan' => request('keterangan'),
        ]);
        Riwayat::create([
            'idPengeluaran' => $pengeluaran->idPengeluaran,
        ]);
        return redirect()->back()->with("successPengeluaran", "Berhasil menambahkan pengeluaran");
    }

    public function pengeluaranDelete($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        return redirect()->back()->with("successPengeluaran", "Pengeluaran telah dihapus");
    }

    // TABUNGAN
    public function tabunganStore()
    {
        Tabungan::create([
            'idUser' => Auth::id(),
            'namaTabungan' => request('namaTabungan'),
            'targetTabungan' => request('targetTabungan'),
            'rencanaPengisian' => request('rencanaPengisian'),
            'nominalPengisian' => request('nominalPengisian'),
            // 'jumlahTabungan' => request('jumlahTabungan'),
            // 'sisa' => request('sisa'),
        ]);
        return redirect()->back()->with("successTabungan", "Berhasil menambahkan tabungan");
    }

    public function tabunganUpdate($id)
    {
        // dd(request()->all());
        // $jumlahTabungan = Tabungan::find($id)->value('nominalPengisian');
        // $tabungan = Tabungan::find($id);
        // $tabungan->update([
        //     'jumlahTabungan' => increment('jumlahTbunga', request('nominalPengisian'))
        // ]);
        Tabungan::find($id)->increment('jumlahTabungan', request('nominalPengisian'));
        Riwayat::create([
            'nominalTabungan' => request('nominalPengisian'),
        ]);
        return redirect()->back()->with("successTambahTabungan", "Berhasil menambahkan nominal tabungan");
    }

    public function tabunganDelete($id)
    {
        $tabungan = Tabungan::find($id);
        $tabungan->delete();
        return redirect()->back()->with("successTabungan", "Tabungan telah dihapus");
    }
}
