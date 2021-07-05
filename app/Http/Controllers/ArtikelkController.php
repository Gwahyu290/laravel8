<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class ArtikelkController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $artikels = Artikel::where('nama','=',Auth()->user()->id)->paginate(5);

    if ($Agent->isMobile()) {
        return view('mobile.artikelk.index', compact('artikels'));
    } else {
        return view('artikelk.index', compact('artikels'));
        }
    }
    public function store(Request $request)
    {
       $request->validate([
            'tgl' => 'required|min:3',
            'cabang_id' => 'required',
            'gambar' => 'required',
        ],[
            'tgl.required' => 'Alamat Karyawan tidak boleh kosong!!!',
            'cabang_id.required' => 'Wilayah Samchick tidak boleh kosong!!!',
            'gambar.required' => 'Status Karyawan tidak boleh kosong!!!'
        ]);    
        $nm = $request->gambar;
        $namafile = $nm->getClientOriginalName();

            $artikel = new Artikel;
            $artikel->nama = Auth()->user()->id;
            $artikel->nama_id = Auth()->user()->name;
            $artikel->tgl = $request->tgl;
            $artikel->cabang_id = $request->cabang_id;
            $artikel->gambar = $namafile;
            $nm->move(public_path().'/pdf', $namafile);
            $artikel->save();
            return redirect('artikelk')->with('status', 'Laporan Artikel Berhasil di Serahkan!!!');
    }
}