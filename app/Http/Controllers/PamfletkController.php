<?php

namespace App\Http\Controllers;
use App\Pamflet;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class PamfletkController extends Controller
{
    public function index(Request $request)
    {
    $Agent = new Agent();

    $pamflets = Pamflet::where('nama','=',Auth()->user()->id)->paginate(5);
        
    if ($Agent->isMobile()) {
        return view('mobile.pamfletk.index', compact('pamflets'));
    } else {
        return view('pamfletk.index', compact('pamflets'));
        }
    }
public function create()
    {
    $Agent = new Agent();
    $cabangs = Cabang::all();

    if ($Agent->isMobile()) {
        return view('mobile.pamflet.create', compact('cabangs'));
    } else {    
        return view('pamflet.create', compact('cabangs'));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

            $pamflet = new Pamflet;
            $pamflet->nama = Auth()->user()->id;
            $pamflet->nama_id = Auth()->user()->name;
            $pamflet->tgl = $request->tgl;
            $pamflet->cabang_id = $request->cabang_id;
            $pamflet->gambar = $namafile;
            $nm->move(public_path().'/pam', $namafile);
            $pamflet->save();
            return redirect('pamfletk')->with('status', 'Laporan Share Pamflet Berhasil di Serahkan!!!');
    }
}
