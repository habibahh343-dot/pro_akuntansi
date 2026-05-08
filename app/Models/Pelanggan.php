<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'kode', 'nama', 'email', 'telepon',
        'alamat', 'npwp', 'limit_piutang',
        'jatuh_tempo', 'is_active', 'keterangan'
    ];

    public function fakturPenjualans()
    {
        return $this->hasMany(FakturPenjualan::class);
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
