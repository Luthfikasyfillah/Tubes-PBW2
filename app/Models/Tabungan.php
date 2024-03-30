<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;
    protected $primaryKey = 'idTabungan';
    protected $fillable = [
        'idUser',
        'namaTabungan',
        'targetTabungan',
        'rencanaPengisian',
        'nominalPengisian',
        'jumlahTabungan',
        'sisa',
    ];

    public function riwayat() 
    {
        return $this->hasOne(Riwayat::class, 'idTabungan');
    }
}
