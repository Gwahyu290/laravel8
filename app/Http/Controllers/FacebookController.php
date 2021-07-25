<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Facebook;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class FacebookController extends Controller
{
    public function index(Request $request)
    {
        if(auth()->user()->level=="Admin"){
            $facebooks= "";    
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
                        $facebooks = Facebook::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                        ->whereBetween('tgl',[$tgl1,$tgl1])->orderBy('nilaifb','ASC')->paginate(5);
                    }else{    
                        $facebooks = Facebook::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                        ->whereBetween('tgl',[$tgl1,$tgl1])->orderBy('nilaifb','DESC')->paginate(5);     
                    }
                }
                else{
                    $facebooks = Facebook::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                        ->whereBetween('tgl',[$tgl1,$tgl1])->paginate(5);
                }}
        if(auth()->user()->level=="Karyawan"){
            $facebooks= "";    
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
                        $facebooks = Facebook::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')->where('nama','=',Auth()->user()->id)
                        ->whereBetween('tgl',[$tgl1,$tgl1])->orderBy('nilaifb','ASC')->paginate(5);
                    }else{    
                        $facebooks = Facebook::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')->where('nama','=',Auth()->user()->id)
                        ->whereBetween('tgl',[$tgl1,$tgl1])->orderBy('nilaifb','DESC')->paginate(5);     
                    }
                }
                else{
                    $facebooks = Facebook::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')->where('nama','=',Auth()->user()->id)
                        ->whereBetween('tgl',[$tgl1,$tgl1])->paginate(5);
                }
            }
        
        $Agent = new Agent();
            
        if(auth()->user()->level=="Admin"){
            if ($Agent->isMobile()) {
                // you're a mobile device
                    return view('mobile.facebook.index',compact('facebooks'));
            } else {
                // you're a desktop device, or something similar
                    return view('facebook.index',compact('facebooks'));
            }
        }
        if(auth()->user()->level=="Karyawan"){
            if ($Agent->isMobile()) {
                // you're a mobile device
                    return view('mobile.facebookk.index',compact('facebooks'));
            } else {
                // you're a desktop device, or something similar
                    return view('facebookk.index',compact('facebooks'));
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
        return view('mobile.facebook.create', compact('cabangs'));
    } else {    
        return view('facebook.create', compact('cabangs'));
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
            'link' => 'required',
        ],[
            'tgl.required' => 'Alamat Karyawan tidak boleh kosong!!!',
            'cabang_id.required' => 'Cabang Samchick tidak boleh kosong!!!',
            'link.required' => 'Link Tugas tidak boleh kosong!!!'
        ]);
        // return $request;
            $facebook = new Facebook;
            $facebook->nama = Auth()->user()->id;
            $facebook->nama_id = Auth()->user()->name;
            $facebook->tgl = date('Y-m-d');
            $facebook->cabang_id = $request->cabang_id;
            $facebook->link = $request->link;
            $facebook->save();

        return redirect('facebookk')->with('status', 'Laporan Upload Facebook Berhasil di Serahkan!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(Facebook $facebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Facebook $facebook)
    {{
        $Agent = new Agent();
    
        $cabangs = Cabang::all();
    
        if ($Agent->isMobile()) {
            return view('mobile.facebook.edit', compact('facebook','cabangs'));
        } else {
            return view('facebook.edit', compact('facebook', 'cabangs'));
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
    public function update(Request $request, Facebook $facebook)
    {
        $request->validate([
            'nilaifb' => 'required',
        ],[
            'nilaifb.required' => 'Nilai Kinerja tidak boleh kosong!!!'
        ]);
        // return $request;
        // cara1
        $cek = DB::select("select * from rekap where tgl='$facebook->tgl' AND nama_id='$facebook->nama_id' AND tipe=0");
        $nilai = $request->nilaifb;
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
                'nama_id' => $facebook->nama_id, 
                'tgl' => $facebook->tgl,
                'fb' => $nilai
                ]);
        }else{
            foreach($cek as $c){
                DB::table('rekap')->where('id_rekap', $c->id_rekap)->update([
                    'fb' => ($c->fb - $facebook->nilaifb)+$nilai
                    ]);
            }        
        }
        $facebook->nilaifb = $request->nilaifb;
        $facebook->predikat = $predikat;
        $facebook->save();

        return redirect('facebook')->with('status', 'Tugas Karyawan Berhasil di Nilai!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facebook $facebook)
    {
        $facebook->delete();
        return redirect('facebook')->with('status', 'Tugas Facebook Berhasil di Hapus!!!');
    }
}
