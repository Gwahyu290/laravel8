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
        if(auth()->user()->level=="Admin"){
            $pamflets= "";    
            $tgl1 = "";
                if($request->tgl1 == "" || $request->tgl1 == null ){
                    $tgl1 = date("Y-m-d");
                }
                if($request->tgl1 != "" || $request->tgl1 != null ){
                    $tgl1 = $request->tgl1;
                    $tgl1 = str_replace("/","-",$tgl1);
                    $tgl1 = date('Y-m-d',strtotime($tgl1));
                    }
            
                if($request->orderBy != null || $request->orderBy != ""){
                    if($request->orderBy=="0"){            
                        $pamflets = Pamflet::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                        ->whereBetween('tgl',[$tgl1,$tgl1])->orderBy('nilaipm','ASC')->paginate(5);
                    }else{    
                        $pamflets = Pamflet::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                        ->whereBetween('tgl',[$tgl1,$tgl1])->orderBy('nilaipm','DESC')->paginate(5);     
                    }
                }
                else{
                    $pamflets = Pamflet::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                        ->whereBetween('tgl',[$tgl1,$tgl1])->paginate(5);
                }}
        if(auth()->user()->level=="Karyawan"){
            $pamflets= "";    
            $tgl1 = "";
                if($request->tgl1 == "" || $request->tgl1 == null ){
                    $tgl1 = date("Y-m-d");
                }
                if($request->tgl1 != "" || $request->tgl1 != null ){
                    $tgl1 = $request->tgl1;
                    $tgl1 = str_replace("/","-",$tgl1);
                    $tgl1 = date('Y-m-d',strtotime($tgl1));
                    }
            
                if($request->orderBy != null || $request->orderBy != ""){
                    if($request->orderBy=="0"){            
                        $pamflets = Pamflet::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')->where('nama','=',Auth()->user()->id)
                        ->whereBetween('tgl',[$tgl1,$tgl1])->orderBy('nilaipm','ASC')->paginate(5);
                    }else{    
                        $pamflets = Pamflet::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')->where('nama','=',Auth()->user()->id)
                        ->whereBetween('tgl',[$tgl1,$tgl1])->orderBy('nilaipm','DESC')->paginate(5);     
                    }
                }
                else{
                    $pamflets = Pamflet::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')->where('nama','=',Auth()->user()->id)
                        ->whereBetween('tgl',[$tgl1,$tgl1])->paginate(5);
                }
            }
        
        $Agent = new Agent();
            
        if(auth()->user()->level=="Admin"){
            if ($Agent->isMobile()) {
                // you're a mobile device
                    return view('mobile.pamflet.index',compact('pamflets'));
            } else {
                // you're a desktop device, or something similar
                    return view('pamflet.index',compact('pamflets'));
            }
        }
        if(auth()->user()->level=="Karyawan"){
            if ($Agent->isMobile()) {
                // you're a mobile device
                    return view('mobile.pamfletk.index',compact('pamflets'));
            } else {
                // you're a desktop device, or something similar
                    return view('pamfletk.index',compact('pamflets'));
            }
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
            $pamflet->tgl = date('Y-m-d');
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
        {
            $Agent = new Agent();
        
            $cabangs = Cabang::all();
        
            if ($Agent->isMobile()) {
                return view('mobile.pamflet.edit', compact('pamflet','cabangs'));
            } else {
                return view('pamflet.edit', compact('pamflet', 'cabangs'));
                }
            }
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
        $cek = DB::select("select * from rekap where tgl='$pamflet->tgl' AND nama_id='$pamflet->nama_id' AND tipe=0");
        $nilai = $request->nilaipm;
        $predikat = "";
        if ($nilai == "0") {
            $predikat = "E";
        }else if ($nilai == "1") {
            $predikat = "D-";
        }else if ($nilai == "2") {
            $predikat = "D";
        }else if ($nilai == "3") {
            $predikat = "D+";
        }else if ($nilai == "4") {
            $predikat = "C-";
        }else if ($nilai == "5") {
            $predikat = "C";
        }else if ($nilai == "6") {
            $predikat = "C+";
        }else if ($nilai == "7") {
            $predikat = "B-";
        }else if ($nilai == "8") {
            $predikat = "B";
        }else if ($nilai == "9") {
            $predikat = "B+";
        }else if ($nilai == "10") {
            $predikat = "A";
        }


        if($cek == null || $cek == ""){
            $save = DB::table('rekap')->insert([
                'nama_id' => $pamflet->nama_id, 
                'tgl' => $pamflet->tgl,
                'pam' => $nilai
                ]);
        }else{
            foreach($cek as $c){
                DB::table('rekap')->where('id_rekap', $c->id_rekap)->update([
                    'pam' => ($c->pam - $pamflet->nilaipm)+$nilai
                    ]);
            }        
        }
        $pamflet->nilaipm = $request->nilaipm;
        $pamflet->predikat = $predikat;
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
