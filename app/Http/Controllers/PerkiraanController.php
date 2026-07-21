<?php

namespace App\Http\Controllers;

use App\Models\Perkiraan;
use Illuminate\Http\Request;

class PerkiraanController extends Controller
{
    public function index()
{
    $perkiraans = Perkiraan::with('parent')->orderBy('kode')->get();
    return view('perkiraan.index', compact('perkiraans'));
}

    public function create()
    {
        $parents = Perkiraan::where('is_detail', false)->get();
        return view('perkiraan.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:perkiraans|max:20',
            'nama' => 'required|max:100',
            'tipe' => 'required',
            'posisi_normal' => 'required',
        ]);

        Perkiraan::create($request->all());
        return redirect()->route('perkiraan.index')->with('success', 'Perkiraan berhasil ditambahkan');
    }

    public function edit(Perkiraan $perkiraan)
    {
        $parents = Perkiraan::where('is_detail', false)->where('id', '!=', $perkiraan->id)->get();
        return view('perkiraan.edit', compact('perkiraan', 'parents'));
    }

    public function update(Request $request, Perkiraan $perkiraan)
    {
        $request->validate([
            'kode' => 'required|max:20|unique:perkiraans,kode,' . $perkiraan->id,
            'nama' => 'required|max:100',
            'tipe' => 'required',
            'posisi_normal' => 'required',
        ]);

        $perkiraan->update($request->all());
        return redirect()->route('perkiraan.index')->with('success', 'Perkiraan berhasil diupdate');
    }

    public function destroy(Perkiraan $perkiraan)
    {
        $perkiraan->delete();
        return redirect()->route('perkiraan.index')->with('success', 'Perkiraan berhasil dihapus');
    }
}