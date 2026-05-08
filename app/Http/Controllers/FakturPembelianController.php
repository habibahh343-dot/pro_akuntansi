<?php

namespace App\Http\Controllers;

use App\Models\FakturPembelian;
use App\Models\Pemasok;
use Illuminate\Http\Request;

class FakturPembelianController extends Controller
{
    public function index()
    {
        $fakturs = FakturPembelian::with('pemasok')->latest()->get();
        return view('faktur_pembelian.index', compact('fakturs'));
    }

    public function create()
    {
        $pemasoks = Pemasok::where('is_active', true)->get();
        return view('faktur_pembelian.create', compact('pemasoks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_faktur' => 'required|unique:faktur_pembelians|max:20',
            'tanggal' => 'required|date',
            'pemasok_id' => 'required|exists:pemasoks,id',
            'total' => 'required|numeric',
        ]);

        FakturPembelian::create($request->all());
        return redirect()->route('faktur_pembelian.index')->with('success', 'Faktur berhasil ditambahkan');
    }

    public function edit(FakturPembelian $fakturPembelian)
    {
        $pemasoks = Pemasok::where('is_active', true)->get();
        return view('faktur_pembelian.edit', compact('fakturPembelian', 'pemasoks'));
    }

    public function update(Request $request, FakturPembelian $fakturPembelian)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pemasok_id' => 'required|exists:pemasoks,id',
            'total' => 'required|numeric',
        ]);

        $fakturPembelian->update($request->all());
        return redirect()->route('faktur_pembelian.index')->with('success', 'Faktur berhasil diupdate');
    }

    public function destroy(FakturPembelian $fakturPembelian)
    {
        $fakturPembelian->delete();
        return redirect()->route('faktur_pembelian.index')->with('success', 'Faktur berhasil dihapus');
    }
}