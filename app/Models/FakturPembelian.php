<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FakturPembelian extends Model
{
    protected $fillable = [
        'no_faktur', 'tanggal', 'pemasok_id',
        'subtotal', 'diskon', 'ppn', 'total',
        'status', 'status_bayar', 'jatuh_tempo',
        'keterangan', 'jurnal_id'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jatuh_tempo' => 'date',
    ];

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }

    public function jurnal()
    {
        return $this->belongsTo(JurnalUmum::class, 'jurnal_id');
    }
}
