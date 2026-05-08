<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeracaSaldo extends Model
{
    protected $fillable = [
        'periode_bulan', 'periode_tahun',
        'perkiraan_id', 'saldo_debit', 'saldo_kredit'
    ];

    public function perkiraan()
    {
        return $this->belongsTo(Perkiraan::class);
    }
}