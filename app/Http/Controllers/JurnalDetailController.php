<?php

namespace App\Http\Controllers;

use App\Models\JurnalDetail;
use App\Models\JurnalUmum;
use App\Models\Perkiraan;
use Illuminate\Http\Request;

class JurnalDetailController extends Controller
{
    public function index()
    {
        $jurnalDetails = JurnalDetail::with(['jurnal', 'perkiraan'])->latest()->get();
        return view('jurnal_detail.index', compact('jurnalDetails'));
    }

    public function create()
    {
        $jurnals = JurnalUmum::all();
        $perkiraans = Perkiraan::where('is_active', true)->get();
        return view('jurnal_detail.create', compact('jurnals', 'perkiraans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jurnal_id' => 'required|exists:jurnal_umums,id',
            'perkiraan_id' => 'required|exists:perkiraans,id',
            'debit' => 'required|numeric',
            'kredit' => 'required|numeric',
        ]);

        JurnalDetail::create($request->all());
        return redirect()->route('jurnal_detail.index')->with('success', 'Jurnal Detail berhasil ditambahkan');
    }

    public function edit(JurnalDetail $jurnalDetail)
    {
        $jurnals = JurnalUmum::all();
        $perkiraans = Perkiraan::where('is_active', true)->get();
        return view('jurnal_detail.edit', compact('jurnalDetail', 'jurnals', 'perkiraans'));
    }

    public function update(Request $request, JurnalDetail $jurnalDetail)
    {
        $request->validate([
            'jurnal_id' => 'required|exists:jurnal_umums,id',
            'perkiraan_id' => 'required|exists:perkiraans,id',
            'debit' => 'required|numeric',
            'kredit' => 'required|numeric',
        ]);

        $jurnalDetail->update($request->all());
        return redirect()->route('jurnal_detail.index')->with('success', 'Jurnal Detail berhasil diupdate');
    }

    public function destroy(JurnalDetail $jurnalDetail)
    {
        $jurnalDetail->delete();
        return redirect()->route('jurnal_detail.index')->with('success', 'Jurnal Detail berhasil dihapus');
    }
}