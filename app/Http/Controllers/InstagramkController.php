<?php

namespace App\Http\Controllers;

use App\Instagram;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use DB;

class InstagramkController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $instagrams = Instagram::where('nama','=',Auth()->user()->id)->paginate(5);
        
    if ($Agent->isMobile()) {
        return view('mobile.instagramk.index', compact('instagrams'));
    } else {
        return view('instagramk.index', compact('instagrams'));
        }
    }
    public function store(Request $request)
    {
       $request->validate([
            'tgl' => 'required|min:3',
            'link' => 'required'
        ],[
            'tgl.required' => 'Alamat Karyawan tidak boleh kosong!!!',
            'link.required' => 'Status Karyawan tidak boleh kosong!!!'
        ]);

        $cabang_id = Auth()->user()->id;
        $cabang = DB::select("select * from users where id='$cabang_id'");
        foreach ($cabang as $c){
            $cabang_id = $c->cabang_id;
            }
        // return $request;    
            $instagram = new Instagram;
            $instagram->nama = Auth()->user()->id;
            $instagram->nama_id = Auth()->user()->name;
            $instagram->tgl = $request->tgl;
            $instagram->cabang_id = $cabang_id;
            $instagram->link = $request->link;
            $instagram->save();

        return redirect('instagramk')->with('status', 'Laporan Repost Instagram Berhasil di Serahkan!!!');
    }
    public function destroy($id,Instagram $instagram)
    {
        $instagram->where('id',$id)->delete();
      return redirect('instagramk')->with('status', 'Data Berhasil di Hapus!!!');
    }
}

