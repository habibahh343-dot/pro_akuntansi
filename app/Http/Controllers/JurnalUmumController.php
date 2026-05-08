<?php

namespace App\Http\Controllers;

use App\Models\JurnalUmum;
use App\Models\JurnalDetail;
use App\Models\Perkiraan;
use Illuminate\Http\Request;

class JurnalUmumController extends Controller
{
    public function index()
    {
        $jurnals = JurnalUmum::with('createdBy')->latest()->get();
        return view('jurnal.index', compact('jurnals'));
    }

    public function create()
    {
        $perkiraans = Perkiraan::where('is_detail', true)->where('is_active', true)->get();
        return view('jurnal.create', compact('perkiraans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_jurnal' => 'required|unique:jurnal_umums|max:20',
            'tanggal' => 'required|date',
            'tipe' => 'required',
            'details' => 'required|array|min:2',
        ]);

        $jurnal = JurnalUmum::create([
            'no_jurnal' => $request->no_jurnal,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
            'status' => 'Draft',
            'created_by' => auth()->id(),
            'keterangan' => $request->keterangan,
        ]);

        foreach ($request->details as $detail) {
            $jurnal->details()->create($detail);
        }

        return redirect()->route('jurnal.index')->with('success', 'Jurnal berhasil ditambahkan');
    }

    public function edit(JurnalUmum $jurnal)
    {
        $perkiraans = Perkiraan::where('is_detail', true)->where('is_active', true)->get();
        return view('jurnal.edit', compact('jurnal', 'perkiraans'));
    }

    public function update(Request $request, JurnalUmum $jurnal)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'tipe' => 'required',
        ]);

        $jurnal->update($request->all());
        return redirect()->route('jurnal.index')->with('success', 'Jurnal berhasil diupdate');
    }

    public function destroy(JurnalUmum $jurnal)
    {
        $jurnal->delete();
        return redirect()->route('jurnal.index')->with('success', 'Jurnal berhasil dihapus');
    }
}