<?php

namespace App\Http\Controllers;

use App\Models\FakturPenjualan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class FakturPenjualanController extends Controller
{
    public function index()
    {
        $fakturs = FakturPenjualan::with('pelanggan')->latest()->get();
        return view('faktur_penjualan.index', compact('fakturs'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::where('is_active', true)->get();
        return view('faktur_penjualan.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_faktur' => 'required|unique:faktur_penjualans|max:20',
            'tanggal' => 'required|date',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'total' => 'required|numeric',
        ]);

        FakturPenjualan::create($request->all());
        return redirect()->route('faktur_penjualan.index')->with('success', 'Faktur berhasil ditambahkan');
    }

    public function edit(FakturPenjualan $fakturPenjualan)
    {
        $pelanggans = Pelanggan::where('is_active', true)->get();
        return view('faktur_penjualan.edit', compact('fakturPenjualan', 'pelanggans'));
    }

    public function update(Request $request, FakturPenjualan $fakturPenjualan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'total' => 'required|numeric',
        ]);

        $fakturPenjualan->update($request->all());
        return redirect()->route('faktur_penjualan.index')->with('success', 'Faktur berhasil diupdate');
    }

    public function destroy(FakturPenjualan $fakturPenjualan)
    {
        $fakturPenjualan->delete();
        return redirect()->route('faktur_penjualan.index')->with('success', 'Faktur berhasil dihapus');
    }
}