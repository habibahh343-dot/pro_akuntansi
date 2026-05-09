<?php

namespace App\Http\Controllers;

use App\Models\BukuBesar;
use App\Models\Perkiraan;
use App\Models\JurnalDetail;
use Illuminate\Http\Request;

class BukuBesarController extends Controller
{
    public function index()
    {
        $bukuBesars = BukuBesar::with(['perkiraan', 'jurnalDetail'])->latest()->get();
        return view('buku_besar.index', compact('bukuBesars'));
    }

    public function create()
    {
        $perkiraans = Perkiraan::where('is_active', true)->get();
        $jurnalDetails = JurnalDetail::all();
        return view('buku_besar.create', compact('perkiraans', 'jurnalDetails'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perkiraan_id' => 'required|exists:perkiraans,id',
            'tanggal' => 'required|date',
            'debit' => 'required|numeric',
            'kredit' => 'required|numeric',
            'saldo' => 'required|numeric',
            'posisi' => 'required',
        ]);

        BukuBesar::create($request->all());
        return redirect()->route('buku_besar.index')->with('success', 'Buku Besar berhasil ditambahkan');
    }

    public function edit(BukuBesar $bukuBesar)
    {
        $perkiraans = Perkiraan::where('is_active', true)->get();
        $jurnalDetails = JurnalDetail::all();
        return view('buku_besar.edit', compact('bukuBesar', 'perkiraans', 'jurnalDetails'));
    }

    public function update(Request $request, BukuBesar $bukuBesar)
    {
        $request->validate([
            'perkiraan_id' => 'required|exists:perkiraans,id',
            'tanggal' => 'required|date',
            'debit' => 'required|numeric',
            'kredit' => 'required|numeric',
            'saldo' => 'required|numeric',
            'posisi' => 'required',
        ]);

        $bukuBesar->update($request->all());
        return redirect()->route('buku_besar.index')->with('success', 'Buku Besar berhasil diupdate');
    }

    public function destroy(BukuBesar $bukuBesar)
    {
        $bukuBesar->delete();
        return redirect()->route('buku_besar.index')->with('success', 'Buku Besar berhasil dihapus');
    }
}