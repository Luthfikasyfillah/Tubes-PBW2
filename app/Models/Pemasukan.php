<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $primaryKey = 'idPemasukan';
    protected $fillable = [
        'idUser',
        'nominalPemasukan',
        'keterangan',
        'tanggal'
    ];

    public function riwayat() 
    {
        return $this->hasOne(Riwayat::class, 'idPemasukan');
    }
}
