<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    public function index()
    {
        $pemasoks = Pemasok::latest()->get();
        return view('pemasok.index', compact('pemasoks'));
    }

    public function create()
    {
        return view('pemasok.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:pemasoks|max:20',
            'nama' => 'required|max:100',
        ]);

        Pemasok::create($request->all());
        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil ditambahkan');
    }

    public function edit(Pemasok $pemasok)
    {
        return view('pemasok.edit', compact('pemasok'));
    }

    public function update(Request $request, Pemasok $pemasok)
    {
        $request->validate([
            'kode' => 'required|max:20|unique:pemasoks,kode,' . $pemasok->id,
            'nama' => 'required|max:100',
        ]);

        $pemasok->update($request->all());
        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil diupdate');
    }

    public function destroy(Pemasok $pemasok)
    {
        $pemasok->delete();
        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil dihapus');
    }
}