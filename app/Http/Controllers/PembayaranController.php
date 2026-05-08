<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pelanggan;
use App\Models\Pemasok;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with(['pelanggan', 'pemasok'])->latest()->get();
        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::where('is_active', true)->get();
        $pemasoks = Pemasok::where('is_active', true)->get();
        return view('pembayaran.create', compact('pelanggans', 'pemasoks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_pembayaran' => 'required|unique:pembayarans|max:20',
            'tanggal' => 'required|date',
            'tipe' => 'required',
            'jumlah' => 'required|numeric',
            'metode' => 'required',
        ]);

        Pembayaran::create($request->all());
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan');
    }

    public function edit(Pembayaran $pembayaran)
    {
        $pelanggans = Pelanggan::where('is_active', true)->get();
        $pemasoks = Pemasok::where('is_active', true)->get();
        return view('pembayaran.edit', compact('pembayaran', 'pelanggans', 'pemasoks'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'tipe' => 'required',
            'jumlah' => 'required|numeric',
            'metode' => 'required',
        ]);

        $pembayaran->update($request->all());
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diupdate');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus');
    }
}