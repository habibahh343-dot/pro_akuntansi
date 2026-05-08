<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JurnalUmum extends Model
{
    protected $fillable = [
        'no_jurnal', 'tanggal', 'deskripsi',
        'tipe', 'status', 'created_by',
        'posted_at', 'keterangan'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'posted_at' => 'datetime',
    ];

    public function details()
    {
        return $this->hasMany(JurnalDetail::class, 'jurnal_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
