<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'idPengeluaran';
    protected $fillable = [
        'idUser',
        'nominalPengeluaran',
        'keterangan',
        'tanggal'
    ];

    public function riwayat() 
    {
        return $this->hasOne(Riwayat::class, 'idPengeluaran');
    }
}
