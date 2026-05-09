<?php

namespace App\Http\Controllers;

use App\Models\SaldoAkun;
use App\Models\Perkiraan;
use Illuminate\Http\Request;

class SaldoAkunController extends Controller
{
    public function index()
    {
        $saldoAkuns = SaldoAkun::with('perkiraan')->latest()->get();
        return view('saldo_akun.index', compact('saldoAkuns'));
    }

    public function create()
    {
        $perkiraans = Perkiraan::where('is_active', true)->get();
        return view('saldo_akun.create', compact('perkiraans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perkiraan_id' => 'required|exists:perkiraans,id',
            'tahun' => 'required|integer',
            'bulan' => 'required|integer',
            'saldo_awal' => 'required|numeric',
            'debit' => 'required|numeric',
            'kredit' => 'required|numeric',
            'saldo_akhir' => 'required|numeric',
        ]);

        SaldoAkun::create($request->all());
        return redirect()->route('saldo_akun.index')->with('success', 'Saldo Akun berhasil ditambahkan');
    }

    public function edit(SaldoAkun $saldoAkun)
    {
        $perkiraans = Perkiraan::where('is_active', true)->get();
        return view('saldo_akun.edit', compact('saldoAkun', 'perkiraans'));
    }

    public function update(Request $request, SaldoAkun $saldoAkun)
    {
        $request->validate([
            'perkiraan_id' => 'required|exists:perkiraans,id',
            'tahun' => 'required|integer',
            'bulan' => 'required|integer',
            'saldo_awal' => 'required|numeric',
            'debit' => 'required|numeric',
            'kredit' => 'required|numeric',
            'saldo_akhir' => 'required|numeric',
        ]);

        $saldoAkun->update($request->all());
        return redirect()->route('saldo_akun.index')->with('success', 'Saldo Akun berhasil diupdate');
    }

    public function destroy(SaldoAkun $saldoAkun)
    {
        $saldoAkun->delete();
        return redirect()->route('saldo_akun.index')->with('success', 'Saldo Akun berhasil dihapus');
    }
}