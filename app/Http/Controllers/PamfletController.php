<?php

namespace App\Http\Controllers;
use App\Pamflet;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use DB;

class PamfletController extends Controller
{
    public function index(Request $request)
    {
    $pamflets= "";    
    $tgl1 = "";
    $tgl2 = "";
        if($request->tgl1 == "" || $request->tgl1 == null ){
            $tgl1 = date("Y-m-d");
        }
        if($request->tgl1 != "" || $request->tgl1 != null ){
            $tgl1 = $request->tgl1;
            $tgl1 = str_replace("/","-",$tgl1);
            $tgl1 = date('Y-m-d',strtotime($tgl1));
            }
        if($request->tgl2 == "" || $request->tgl2 == null){
            $tgl2 = date("Y-m-d");
        }
        if($request->tgl2 != "" || $request->tgl2 != null){
            $tgl2 = $request->tgl2;
            $tgl2 = str_replace("/","-",$tgl2);
            $tgl2 = date('Y-m-d',strtotime($tgl2));
        }

        if($request->orderBy != null || $request->orderBy != ""){
            if($request->orderBy=="0"){            
                $pamflets = Pamflet::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                ->whereBetween('tgl',[$tgl1,$tgl2])->orderBy('nilaipm','ASC')->paginate(5);
            }else{    
                $pamflets = Pamflet::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                ->whereBetween('tgl',[$tgl1,$tgl2])->orderBy('nilaipm','DESC')->paginate(5);     
            }
        }
        else{
            $pamflets =Pamflet::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                ->whereBetween('tgl',[$tgl1,$tgl2])->paginate(10);
        }
    $Agent = new Agent();
        
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
            $nm->move(public_path().'/pam', $namafile);
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
