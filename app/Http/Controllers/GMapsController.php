<?php

namespace App\Http\Controllers;
use DB;
use App\Googlemap;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class GMapsController extends Controller
{
    public function index(Request $request)
    {
    $googlemaps= "";    
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
                $googlemaps = Googlemap::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                ->whereBetween('tgl',[$tgl1,$tgl2])->orderBy('nilaigm','ASC')->paginate(5);
            }else{    
                $googlemaps = Googlemap::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                ->whereBetween('tgl',[$tgl1,$tgl2])->orderBy('nilaigm','DESC')->paginate(5);     
            }
        }
        else{
            $googlemaps =Googlemap::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                ->whereBetween('tgl',[$tgl1,$tgl2])->paginate(5);
        }
    $Agent = new Agent();
        
    if ($Agent->isMobile()) {
        return view('mobile/googlemap/index', compact('googlemaps'));
    } else {
        return view('googlemap.index', compact('googlemaps'));
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
        return view('mobile.googlemap.create', compact('cabangs'));
    } else {    
        return view('googlemap.create', compact('cabangs'));
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
            'cabang_id.required' => 'Wilayah Samchick tidak boleh kosong!!!',
            'link.required' => 'Link Tugas tidak boleh kosong!!!'
        ]);
        // return $request;   
            $googlemap = new Googlemap;
            $googlemap->nama = Auth()->user()->id;
            $googlemap->nama_id = Auth()->user()->name;
            $googlemap->tgl = $request->tgl;
            $googlemap->cabang_id = $request->cabang_id;
            $googlemap->link = $request->link;
            $googlemap->save();

        return redirect('googlemapk')->with('status', 'Laporan Google Views Berhasil di Serahkan!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(Googlemap $googlemap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Googlemap $googlemap)
    {
        $cabangs = Cabang::all();
        return view('googlemap.edit', compact('googlemap','cabangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Googlemap $googlemap)
    {
        $request->validate([
            'nilaigm' => 'required',
        ],[
            'nilaigm.required' => 'Nilai tidak boleh kosong!!!'
        ]);
        // return $request;
        // cara1
        $cek = DB::select("select * from rekap where tgl='$googlemap->tgl' AND nama_id='$googlemap->nama_id'");
        $nilai = $request->nilaigm;
       

        if($cek == null || $cek == ""){
            $save = DB::table('rekap')->insert([
                'nama_id' => $googlemap->nama_id, 
                'tgl' => $googlemap->tgl,
                'gm' => $nilai
                ]);
        }else{
            foreach($cek as $c){
                DB::table('rekap')->where('id_rekap', $c->id_rekap)->update([
                    'gm' => ($c->gm - $googlemap->nilaigm)+$nilai
                    ]);
            }        
        }

        $googlemap->nilaigm = $request->nilaigm;
        $googlemap->save();

        return redirect('googlemap')->with('status', 'Tugas Google Maps Berihasil Dinilai!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Googlemap $googlemap)
    {
        $googlemap->delete();
        return redirect('googlemap')->with('status', 'Laporan Google Views Berhasil di Hapus!!!');
    }
}
