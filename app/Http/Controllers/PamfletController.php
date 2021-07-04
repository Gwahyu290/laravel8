<?php

namespace App\Http\Controllers;
use App\Pamflet;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use DB;

class PamfletController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $pamflets = Pamflet::paginate(5);
        
    if ($Agent->isMobile()) {
        return view('mobile.pamflet.index', compact('pamflets'));
    } else {
        return view('pamflet.index', compact('pamflets'));
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
            $nm->move(public_path().'/pdf', $namafile);
            $pamflet->save();
            return redirect('pamfletk')->with('status', 'Laporan Share Pamflet Berhasil di Serahkan!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(Pamflet $pamflet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pamflet $pamflet)
    {
        $cabangs = Cabang::all();
        return view('pamflet.edit', compact('pamflet', 'cabangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pamflet $pamflet)
    {
        
        $request->validate([
            'nilaipm' => 'required',
        ],[
            'nilaipm.required' => 'Status Karyawan tidak boleh kosong!!!'
        ]);
        // return $request;
        // cara1
        $cek = DB::select("select * from rekapmingguan where tgl='$pamflet->tgl' AND nama_id='$pamflet->nama_id'");
        $nilai = $request->nilaipm;
       

        if($cek == null || $cek == ""){
            $save = DB::table('rekapmingguan')->insert([
                'nama_id' => $pamflet->nama_id, 
                'tgl' => $pamflet->tgl,
                'pam' => $nilai
                ]);
        }else{
            foreach($cek as $c){
                DB::table('rekapmingguan')->where('id_mingguan', $c->id_mingguan)->update([
                    'pam' => ($c->pam - $pamflet->nilaipm)+$nilai
                    ]);
            }        
        }

        $pamflet->nilaipm = $request->nilaipm;
        $pamflet->save();

        return redirect('pamflet')->with('status', 'Tugas Karyawan Berhasil di Nilai!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pamflet $pamflet)
    {
        $pamflet->delete();
        return redirect('pamflet')->with('status', 'Tugas Share Pamflet Berhasil di Hapus!!!');
    }
}
