<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'no_pembayaran', 'tanggal', 'tipe',
        'sumber_type', 'sumber_id',
        'pelanggan_id', 'pemasok_id',
        'jumlah', 'metode', 'no_referensi',
        'keterangan', 'jurnal_id'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }

    public function jurnal()
    {
        return $this->belongsTo(JurnalUmum::class, 'jurnal_id');
    }
}