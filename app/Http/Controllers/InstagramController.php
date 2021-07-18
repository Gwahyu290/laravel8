<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Instagram;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
class InstagramController extends Controller
{
    public function index(Request $request)
    {
    //declare tgl 1 and tgl2
    $instagrams= "";    
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
                $instagrams = Instagram::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                ->whereBetween('tgl',[$tgl1,$tgl1])->orderBy('nilaiins','ASC')->paginate(5);
            }else{    
                $instagrams = Instagram::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                ->whereBetween('tgl',[$tgl1,$tgl1])->orderBy('nilaiins','DESC')->paginate(5);     
            }
        }
        else{
            $instagrams = Instagram::where('nama_id','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
                ->whereBetween('tgl',[$tgl1,$tgl1])->paginate(5);
        }
    $Agent = new Agent();
        
    if ($Agent->isMobile()) {
        return view('mobile.instagram.index', compact('instagrams'));
    } else {
        return view('instagram.index', compact('instagrams'));
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
        return view('mobile.instagram.create', compact('cabangs'));
    } else {
        return view('instagram.create', compact('cabangs'));
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
            'link' => 'required'
        ],[
            'tgl.required' => 'Alamat Karyawan tidak boleh kosong!!!',
            'cabang_id.required' => 'Cabang Samchick tidak boleh kosong!!!',
            'link.required' => 'Status Karyawan tidak boleh kosong!!!'
        ]);
        // return $request;    
            $instagram = new Instagram;
            $instagram->nama = Auth()->user()->id;
            $instagram->nama_id = Auth()->user()->name;
            $instagram->tgl = date('Y-m-d');
            $instagram->cabang_id = $request->cabang_id;
            $instagram->link = $request->link;
            $instagram->save();

        return redirect('instagramk')->with('status', 'Laporan Repost Instagram Berhasil di Serahkan!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(Instagram $instagram)
    {
                
    $Agent = new Agent();
    $users = User::all();
    if ($Agent->isMobile()) {
        return view('mobile.instagram.create', compact('cabangs'));
    } else {
        return view('instagram.index', compact('user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Instagram $instagram)
    {
        {
        $Agent = new Agent();
    
        $cabangs = Cabang::all();
    
        if ($Agent->isMobile()) {
            return view('mobile.instagram.edit', compact('instagram','cabangs'));
        } else {
            return view('instagram.edit', compact('instagram', 'cabangs'));
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
    public function update(Request $request, Instagram $instagram)
    {
        
        $request->validate([
            'nilaiins' => 'required'
        ],[
            'nilaiins.required' => 'Nilai Kinerja tidak boleh kosong!!!'
        ]);
        // return $request;
        // cara1
        $cek = DB::select("select * from rekap where tgl='$instagram->tgl' AND nama_id='$instagram->nama_id' AND tipe=0");
        $nilai = $request->nilaiins;
       

        if($cek == null || $cek == ""){
            $save = DB::table('rekap')->insert([
                'nama_id' => $instagram->nama_id, 
                'tgl' => $instagram->tgl,
                'ig' => $nilai
                ]);
        }else{
            foreach($cek as $c){
                DB::table('rekap')->where('id_rekap', $c->id_rekap)->update([
                    'ig' => ($c->ig - $instagram->nilaiig)+$nilai
                    ]);
            }        
        }
        $instagram->nilaiins = $request->nilaiins;
        $instagram->save();

        return redirect('instagram')->with('status', 'Tugas Karyawan Berhasil di Nilai!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instagram $instagram)
    {
        $instagram->delete();
        return redirect('instagram')->with('status', 'Data Berhasil di Hapus!!!');
    }
}
