<?php

namespace App\Http\Controllers;

use App\Models\NeracaSaldo;
use App\Models\Perkiraan;
use Illuminate\Http\Request;

class NeracaSaldoController extends Controller
{
    public function index()
    {
        $neracaSaldos = NeracaSaldo::with('perkiraan')->latest()->get();
        return view('neraca_saldo.index', compact('neracaSaldos'));
    }

    public function create()
    {
        $perkiraans = Perkiraan::where('is_active', true)->get();
        return view('neraca_saldo.create', compact('perkiraans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode_bulan' => 'required|integer',
            'periode_tahun' => 'required|integer',
            'perkiraan_id' => 'required|exists:perkiraans,id',
            'saldo_debit' => 'required|numeric',
            'saldo_kredit' => 'required|numeric',
        ]);

        NeracaSaldo::create($request->all());
        return redirect()->route('neraca_saldo.index')->with('success', 'Neraca Saldo berhasil ditambahkan');
    }

    public function edit(NeracaSaldo $neracaSaldo)
    {
        $perkiraans = Perkiraan::where('is_active', true)->get();
        return view('neraca_saldo.edit', compact('neracaSaldo', 'perkiraans'));
    }

    public function update(Request $request, NeracaSaldo $neracaSaldo)
    {
        $request->validate([
            'periode_bulan' => 'required|integer',
            'periode_tahun' => 'required|integer',
            'perkiraan_id' => 'required|exists:perkiraans,id',
            'saldo_debit' => 'required|numeric',
            'saldo_kredit' => 'required|numeric',
        ]);

        $neracaSaldo->update($request->all());
        return redirect()->route('neraca_saldo.index')->with('success', 'Neraca Saldo berhasil diupdate');
    }

    public function destroy(NeracaSaldo $neracaSaldo)
    {
        $neracaSaldo->delete();
        return redirect()->route('neraca_saldo.index')->with('success', 'Neraca Saldo berhasil dihapus');
    }
}