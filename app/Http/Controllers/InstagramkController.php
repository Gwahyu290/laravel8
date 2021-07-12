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
        $nm = $request->gambarig;
        $nm1 = $request->gambarig1;
        $nm2 = $request->gambarig2;
            $namafile = $nm->getClientOriginalName();
            $namafile1 = $nm1->getClientOriginalName();
            $namafile2 = $nm2->getClientOriginalName();

            $instagram = new Instagram;
            $instagram->nama = Auth()->user()->id;
            $instagram->nama_id = Auth()->user()->name;
            $instagram->tgl = $request->tgl;
            $instagram->cabang_id = $cabang_id;
            $instagram->link = $request->link;
            $instagram->gambarig = $namafile;
            $nm->move(public_path().'/ig', $namafile);
            $instagram->link1 = $request->link1;
            $instagram->gambarig1 = $namafile1;
            $nm1->move(public_path().'/ig', $namafile1);
            $instagram->link2 = $request->link2;
            $instagram->gambarig2 = $namafile2;
            $nm2->move(public_path().'/ig', $namafile2);
            $instagram->save();

        return redirect('instagramk')->with('status', 'Laporan Repost Instagram Berhasil di Serahkan!!!');
    }
    public function destroy($id,Instagram $instagram)
    {
        $instagram->where('id',$id)->delete();
      return redirect('instagramk')->with('status', 'Data Berhasil di Hapus!!!');
    }
}

