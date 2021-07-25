<?php

namespace App\Http\Controllers;
use App\Artikel;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use DB;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        if(auth()->user()->level=="Admin"){
            $artikels= "";    
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
                        $artikels = Artikel::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                        ->whereBetween('tgl',[$tgl1,$tgl1])->orderBy('nilaiar','ASC')->paginate(5);
                    }else{    
                        $artikels = Artikel::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                        ->whereBetween('tgl',[$tgl1,$tgl1])->orderBy('nilaiar','DESC')->paginate(5);     
                    }
                }
                else{
                    $artikels = Artikel::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                        ->whereBetween('tgl',[$tgl1,$tgl1])->paginate(5);
                }}
        if(auth()->user()->level=="Karyawan"){
            $artikels= "";    
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
                        $artikels = Artikel::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')->where('nama','=',Auth()->user()->id)
                        ->whereBetween('tgl',[$tgl1,$tgl1])->orderBy('nilaiar','ASC')->paginate(5);
                    }else{    
                        $artikels = Artikel::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')->where('nama','=',Auth()->user()->id)
                        ->whereBetween('tgl',[$tgl1,$tgl1])->orderBy('nilaiar','DESC')->paginate(5);     
                    }
                }
                else{
                    $artikels = Artikel::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')->where('nama','=',Auth()->user()->id)
                        ->whereBetween('tgl',[$tgl1,$tgl1])->paginate(5);
                }
            }
        
        $Agent = new Agent();
            
        if(auth()->user()->level=="Admin"){
            if ($Agent->isMobile()) {
                // you're a mobile device
                    return view('mobile.artikel.index',compact('artikels'));
            } else {
                // you're a desktop device, or something similar
                    return view('artikel.index',compact('artikels'));
            }
        }
        if(auth()->user()->level=="Karyawan"){
            if ($Agent->isMobile()) {
                // you're a mobile device
                    return view('mobile.artikelk.index',compact('artikels'));
            } else {
                // you're a desktop device, or something similar
                    return view('artikelk.index',compact('artikels'));
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
        return view('mobile.artikel.create', compact('cabangs'));
    } else {
        return view('artikel.create', compact('cabangs'));
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

            $artikel = new Artikel;
            $artikel->nama = Auth()->user()->id;
            $artikel->nama_id = Auth()->user()->name;
            $artikel->tgl = date('Y-m-d');
            $artikel->cabang_id = $request->cabang_id;
            $artikel->gambar = $namafile;
            $nm->move(public_path().'/pdf', $namafile);
            $artikel->save();
            return redirect('artikelk')->with('status', 'Laporan Artikel Berhasil di Serahkan!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        {
            $Agent = new Agent();
        
            $cabangs = Cabang::all();
        
            if ($Agent->isMobile()) {
                return view('mobile.artikel.edit', compact('artikel','cabangs'));
            } else {
                return view('artikel.edit', compact('artikel', 'cabangs'));
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
    public function update(Request $request, Artikel $artikel)
    {
        
        $request->validate([
            'nilaiar' => 'required',
        ],[
            'nilaiar.required' => 'Status Karyawan tidak boleh kosong!!!'
        ]);
        // return $request;
        // cara1
        $cek = DB::select("select * from rekap where tgl='$artikel->tgl' AND nama_id='$artikel->nama_id' AND tipe=0");
        $nilai = $request->nilaiar;
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
                'nama_id' => $artikel->nama_id, 
                'tgl' => $artikel->tgl,
                'ar' => $nilai
                ]);
        }else{
            foreach($cek as $c){
                DB::table('rekap')->where('id_rekap', $c->id_rekap)->update([
                    'ar' => ($c->ar - $artikel->nilaiar)+$nilai
                    ]);
            }        
        }
        $artikel->nilaiar = $request->nilaiar;
        $artikel->predikat = $predikat;
        $artikel->save();

        return redirect('artikel')->with('status', 'Tugas Karyawan Berhasil di Nilai!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return redirect('artikel')->with('status', 'Tugas Artikel Karyawan Berhasil di Hapus!!!');
    }
}
