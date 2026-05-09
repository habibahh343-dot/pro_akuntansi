<?php

namespace App\Http\Controllers;

use App\Models\LaporanKeuangan;
use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        $laporans = LaporanKeuangan::latest()->get();
        return view('laporan_keuangan.index', compact('laporans'));
    }

    public function create()
    {
        return view('laporan_keuangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required',
            'periode_bulan' => 'required|integer',
            'periode_tahun' => 'required|integer',
        ]);

        LaporanKeuangan::create([
            'tipe' => $request->tipe,
            'periode_bulan' => $request->periode_bulan,
            'periode_tahun' => $request->periode_tahun,
            'data' => $request->data,
            'generated_at' => now(),
            'generated_by' => auth()->id() ?? 1,
        ]);

        return redirect()->route('laporan_keuangan.index')->with('success', 'Laporan Keuangan berhasil ditambahkan');
    }

    public function edit(LaporanKeuangan $laporanKeuangan)
    {
        return view('laporan_keuangan.edit', compact('laporanKeuangan'));
    }

    public function update(Request $request, LaporanKeuangan $laporanKeuangan)
    {
        $request->validate([
            'tipe' => 'required',
            'periode_bulan' => 'required|integer',
            'periode_tahun' => 'required|integer',
        ]);

        $laporanKeuangan->update($request->all());
        return redirect()->route('laporan_keuangan.index')->with('success', 'Laporan Keuangan berhasil diupdate');
    }

    public function destroy(LaporanKeuangan $laporanKeuangan)
    {
        $laporanKeuangan->delete();
        return redirect()->route('laporan_keuangan.index')->with('success', 'Laporan Keuangan berhasil dihapus');
    }
}