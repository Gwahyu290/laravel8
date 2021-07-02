<?php

namespace App\Http\Controllers;
use DB;
use App\Facebook;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class FacebookController extends Controller
{
    public function index()
    {
    $Agent = new Agent();
    $facebooks = Facebook::paginate(5);

    if ($Agent->isMobile()) {
        return view('mobile.facebook.index', compact('facebooks'));
    } else {
        return view('facebook.index', compact('facebooks'));
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
            $facebook->tgl = $request->tgl;
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
    {
        $cabangs = Cabang::all();
        return view('facebook.edit', compact('facebook', 'cabangs'));
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
        $cek = DB::select("select * from rekap where tgl='$facebook->tgl' AND nama_id='$facebook->nama_id'");
        $nilai = $request->nilaifb;
       

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
