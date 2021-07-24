<?php

namespace App\Http\Controllers;

use App\Instagram;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use DB;

class InstagramkController extends Controller
{
    public function store(Request $request)
    {  
       $request->validate([
            'link' => 'required',
            'gambarig' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ],[
            'gambarig.required' => 'Gambar tidak boleh kosong!!!',
            'link.required' => 'Link Pengumpulan tugas tidak boleh kosong!!!'
        ]);
        
        $cabang_id = Auth()->user()->id;
        $cabang = DB::select("select * from users where id='$cabang_id'");
        foreach ($cabang as $c){
            $cabang_id = $c->cabang_id;
            }
        // return $request;    
        $nm = $request->gambarig;
            $namafile = $nm->getClientOriginalName();

            $instagram = new Instagram;
            $instagram->nama = Auth()->user()->id;
            $instagram->nama_id = Auth()->user()->name;
            $instagram->tgl = date('Y-m-d');
            $instagram->cabang_id = $cabang_id;
            $instagram->link = $request->link;
            $instagram->gambarig = $namafile;
            $nm->move(public_path().'/ig', $namafile);
            $instagram->save();

        return redirect('instagramk')->with('status', 'Laporan Repost Instagram Berhasil di Serahkan!!!');
        
    }
    public function destroy($id,Instagram $instagram)
    {
        $instagram->where('id',$id)->delete();
      return redirect('instagramk')->with('status', 'Data Berhasil di Hapus!!!');
    }
}

