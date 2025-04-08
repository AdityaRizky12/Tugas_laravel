<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekening;
use Illuminate\Support\Str;
class rekeningController extends Controller
{
    public function index(){

       // $title ="SelamatDatang";
       // $content="ini adalah utama";

       // $config = app('config');
       // dd($config);
        //$today= date('d-m-Y');
        //dd($today);
       // $text = 'diudhfsuihfsuihfuidhkuhsddfkuhhdhjsdhgfjusdgfjsgfjhdgdfjhdgfjhsgdfjhgsdfjh';
       // $kata= Str::limit($text, $limit=20);
      //  dd($kata);
       // session()->put(['kode'=>'2345','pass'=>'saya123']);
       // $kode = session()->get('kode');
      //  $pass = session()->get('pass');
        //dd(['kode' => $kode, 'pass' => $pass]);
     //  return view('layouts.latihan.rekening', compact('title','content'));
$rekening = Rekening::all();

     return view('layouts.page.rekening.index', compact('rekening'));
    }
    public function daftar(){
        return view('layouts.latihan.daftar');
     }

     public function simpanRek(Request $req){
      //  dd($req->rekening);
        Rekening::create([
          'namaRekening' => $req->nmrek,
           'saldoAwal' => $req->sa,
         ]);
         return back()->with(['berhasil' => 'Tambahan Rekening berhasil disimpan..'.$req->nmrek]);
     }

     public function updateRek(Request $request)
    {
        $rekening = Rekening::findOrFail($request->idrek);
        $rekening->NamaRekening = $request->nmrek1;
        $rekening->saldoAwal = $request->sa1;
        $rekening->update();
        
        return back()->with(['berhasil' => 'Update Rekening Berhasil']);
    }

      public function deleteRek(Request $request) {
         $rekening = Rekening::findOrFail($request->id);
         $rekening->delete();
         return back()->with(['hapus' => 'Hapus Rekening Berhasil']);
      }

     public function tampilanRek(){
        $title ="SelamatDatang";
        $content="ini adalah utama";
        $rekening = Rekening::all();
        return view('layouts.latihan.rekening' ,compact('rekening','title','content'));
     }
}
