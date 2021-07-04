<?php

namespace App\Http\Controllers;
use App\Whatsapp;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use DB;

class WhatsappController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $whatsapps = Whatsapp::paginate(5);
        
    if ($Agent->isMobile()) {
        return view('mobile.Whatsapp.index', compact('whatsapps'));
    } else {
        return view('whatsapp.index', compact('whatsapps'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $Agent = new Agent();
    $cabangs = Cabang::all();

    if ($Agent->isMobile()) {
        return view('mobile.whatsapp.create', compact('cabangs'));
    } else {    
        return view('Whatsapp.create', compact('cabangs'));
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

            $whatsapp = new Whatsapp;
            $whatsapp->nama = Auth()->user()->id;
            $whatsapp->nama_id = Auth()->user()->name;
            $whatsapp->tgl = $request->tgl;
            $whatsapp->cabang_id = $request->cabang_id;
            $whatsapp->gambar = $namafile;
            $nm->move(public_path().'/pdf', $namafile);
            $whatsapp->save();
            return redirect('whatsappk')->with('status', 'Laporan Share Whatsapp Berhasil di Serahkan!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(Whatsapp $whatsapp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Whatsapp $whatsapp)
    {
        $cabangs = Cabang::all();
        return view('whatsapp.edit', compact('whatsapp', 'cabangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Whatsapp $whatsapp)
    {
        
        $request->validate([
            'nilaiwa' => 'required',
        ],[
            'nilaiwa.required' => 'Status Karyawan tidak boleh kosong!!!'
        ]);
        // return $request;
        // cara1

        $cek = DB::select("select * from rekapmingguan where tgl='$whatsapp->tgl' AND nama_id='$whatsapp->nama_id'");
        $nilai = $request->nilaiwa;
       

        if($cek == null || $cek == ""){
            $save = DB::table('rekapmingguan')->insert([
                'nama_id' => $whatsapp->nama_id, 
                'tgl' => $whatsapp->tgl,
                'wa' => $nilai
                ]);
        }else{
            foreach($cek as $c){
                DB::table('rekapmingguan')->where('id_mingguan', $c->id_mingguan)->update([
                    'wa' => ($c->wa - $whatsapp->nilaiwa)+$nilai
                    ]);
            }        
        }
        $whatsapp->nilaiwa = $request->nilaiwa;
        $whatsapp->save();

        return redirect('whatsapp')->with('status', 'Tugas Karyawan Berhasil di Nilai!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Whatsapp $whatsapp)
    {
        $whatsapp->delete();
        return redirect('whatsapp')->with('status', 'Tugas Share Whatsapp Berhasil di Hapus!!!');
    }
}
