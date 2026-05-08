<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuBesar extends Model
{
    protected $fillable = [
        'perkiraan_id', 'tanggal', 'no_ref',
        'deskripsi', 'debit', 'kredit',
        'saldo', 'jurnal_detail_id', 'posisi'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function perkiraan()
    {
        return $this->belongsTo(Perkiraan::class);
    }

    public function jurnalDetail()
    {
        return $this->belongsTo(JurnalDetail::class);
    }
}