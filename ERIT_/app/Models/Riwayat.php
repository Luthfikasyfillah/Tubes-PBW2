<?php

namespace App\Models;

use App\Models\Tabungan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Riwayat extends Model
{
    use HasFactory;
    protected $fillable = [
        'idPemasukan',
        'idPengeluaran',
        'nominalTabungan'
    ];

    public function pemasukan()
    {
        return $this->belongsTo(Pemasukan::class, 'idPemasukan');
    }

    public function pengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class, 'idPengeluaran');
    }

    public function tabungan()
    {
        return $this->belongsTo(Tabungan::class, 'idTabungan');
    }
}
