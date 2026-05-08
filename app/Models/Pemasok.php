<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    protected $fillable = [
        'kode', 'nama', 'email', 'telepon',
        'alamat', 'npwp', 'bank',
        'no_rekening', 'is_active', 'keterangan'
    ];

    public function fakturPembelians()
    {
        return $this->hasMany(FakturPembelian::class);
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
