<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perkiraan extends Model
{
    protected $fillable = [
        'kode', 'nama', 'tipe', 'posisi_normal',
        'parent_id', 'level', 'is_detail',
        'is_active', 'saldo_awal', 'keterangan'
    ];

    public function parent()
    {
        return $this->belongsTo(Perkiraan::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Perkiraan::class, 'parent_id');
    }

    public function jurnalDetails()
    {
        return $this->hasMany(JurnalDetail::class);
    }

    public function bukuBesars()
    {
        return $this->hasMany(BukuBesar::class);
    }
}
