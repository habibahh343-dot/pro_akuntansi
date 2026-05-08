<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FakturPenjualan extends Model
{
    protected $fillable = [
        'no_faktur', 'tanggal', 'pelanggan_id',
        'subtotal', 'diskon', 'ppn', 'total',
        'status', 'status_bayar', 'jatuh_tempo',
        'keterangan', 'jurnal_id'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jatuh_tempo' => 'date',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function jurnal()
    {
        return $this->belongsTo(JurnalUmum::class, 'jurnal_id');
    }
}
