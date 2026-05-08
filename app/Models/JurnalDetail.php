<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JurnalDetail extends Model
{
    protected $fillable = [
        'jurnal_id', 'perkiraan_id',
        'deskripsi', 'debit', 'kredit'
    ];

    public function jurnal()
    {
        return $this->belongsTo(JurnalUmum::class, 'jurnal_id');
    }

    public function perkiraan()
    {
        return $this->belongsTo(Perkiraan::class);
    }

    public function bukuBesar()
    {
        return $this->hasOne(BukuBesar::class);
    }
}
