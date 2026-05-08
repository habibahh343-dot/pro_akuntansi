<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKeuangan extends Model
{
    protected $fillable = [
        'tipe', 'periode_bulan', 'periode_tahun',
        'data', 'generated_at', 'generated_by'
    ];

    protected $casts = [
        'data' => 'array',
        'generated_at' => 'datetime',
    ];

    public function generatedBy()
    {
        return $this->belongsTo(User::class, 'generated_by');
    }
}
