<?php

namespace App\Http\Controllers;
use App\Pamflet;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use DB;
class PamfletkController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar1' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ],[
            'gambar.required' => 'Gambar tidak boleh kosong!!!',
            'gambar1.required' => 'Gambar tidak boleh kosong!!!'
        ]);    
        $nm = $request->gambar;
        $nm1 = $request->gambar1;
        $namafile = $nm->getClientOriginalName();
        $namafile1 = $nm1->getClientOriginalName();

        $cabang_id = Auth()->user()->id;
        $cabang = DB::select("select * from users where id='$cabang_id'");
        foreach ($cabang as $c){
            $cabang_id = $c->cabang_id;
            }
        
            $pamflet = new Pamflet;
            $pamflet->nama = Auth()->user()->id;
            $pamflet->nama_id = Auth()->user()->name;
            $pamflet->tgl = date('Y-m-d');
            $pamflet->cabang_id = $cabang_id;
            $pamflet->gambar = $namafile;
            $nm->move(public_path().'/pam', $namafile);
            $pamflet->gambar1 = $namafile1;
            $nm1->move(public_path().'/pam', $namafile1);
            $pamflet->save();
            return redirect('pamfletk')->with('status', 'Laporan Share Pamflet Berhasil di Serahkan!!!');
    }
    public function destroy($id,Pamflet $pamflet)
    {
        $pamflet->where('id',$id)->delete();
      return redirect('pamfletk')->with('status', 'Data Berhasil di Hapus!!!');
    }
}
