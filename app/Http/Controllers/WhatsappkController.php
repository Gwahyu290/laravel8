<?php

namespace App\Http\Controllers;
use App\Whatsapp;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use DB;
class WhatsappkController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $whatsapps = Whatsapp::where('nama','=',Auth()->user()->id)->paginate(15);
        
    if ($Agent->isMobile()) {
        return view('mobile.whatsappk.index', compact('whatsapps'));
    } else {
        return view('whatsappk.index', compact('whatsapps'));
        }
    }

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
            'gambar' => 'required',
        ],[
            'gambar.required' => 'Status Karyawan tidak boleh kosong!!!'
        ]);    
        $nm = $request->gambar;
        $namafile = $nm->getClientOriginalName();
        
        $cabang_id = Auth()->user()->id;
        $cabang = DB::select("select * from users where id='$cabang_id'");
        foreach ($cabang as $c){
            $cabang_id = $c->cabang_id;
            }
        
            $whatsapp = new Whatsapp;
            $whatsapp->nama = Auth()->user()->id;
            $whatsapp->nama_id = Auth()->user()->name;
            $whatsapp->tgl = date('Y-m-d');
            $whatsapp->cabang_id = $cabang_id;
            $whatsapp->gambar = $namafile;
            $nm->move(public_path().'/wa', $namafile);
            $whatsapp->save();
            return redirect('whatsappk')->with('status', 'Laporan Share Whatsapp Berhasil di Serahkan!!!');
    }
    public function destroy($id,Whatsapp $whatsapp)
    {
        $whatsapp->where('id',$id)->delete();
      return redirect('whatsappk')->with('status', 'Data Berhasil di Hapus!!!');
    }
}