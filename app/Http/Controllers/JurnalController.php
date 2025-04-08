<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurnal;
use App\Models\Rekening;

class JurnalController extends Controller
{
    public function index()
    {
        $jurnal = Jurnal::all(); 
        $rekening = Rekening::all(); 

        return view('layouts.page.jurnal.index', compact('jurnal', 'rekening'));
    }
    public function simpanJurnal(Request $req)
    {
        $tanggal = $req->tanggal;
        $keterangan = $req->keterangan;
        $rekening = $req->rekening;
        $debit = $req->debit;
        $kredit = $req->kredit;
    
        // Validasi minimal 1 entri harus ada
        if (!$rekening || count($rekening) == 0) {
            return back()->with('gagal', 'Minimal satu data jurnal harus diisi.');
        }
    
        foreach ($rekening as $i => $rek) {
            Jurnal::create([
                'tanggal'    => $tanggal,
                'rekening'   => $rek,
                'keterangan' => $keterangan,
                'debit'      => $debit[$i] ?? 0,
                'kredit'     => $kredit[$i] ?? 0,
            ]);
        }
    
        return back()->with('berhasil', 'Data jurnal berhasil ditambahkan.');
    }
    


}

