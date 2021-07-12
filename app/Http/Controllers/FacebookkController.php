<?php

namespace App\Http\Controllers;
use DB;
use App\Facebook;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class FacebookkController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $facebooks = Facebook::where('nama','=',Auth()->user()->id)->paginate(5);

    if ($Agent->isMobile()) {
        return view('mobile.facebookk.index', compact('facebooks'));
    } else {
        return view('facebookk.index', compact('facebooks'));
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
        $nm = $request->gambarfb;
            $namafile = $nm->getClientOriginalName();

            $facebook = new Facebook;
            $facebook->nama = Auth()->user()->id;
            $facebook->nama_id = Auth()->user()->name;
            $facebook->tgl = $request->tgl;
            $facebook->cabang_id = $cabang_id;
            $facebook->link = $request->link;
            $facebook->gambarfb = $namafile;
            $nm->move(public_path().'/fb', $namafile);
            $facebook->save();

        return redirect('facebookk')->with('status', 'Laporan Repost Facebook Berhasil di Serahkan!!!');
    }
    public function destroy($id,Facebook $facebook)
    {
        $facebook->where('id',$id)->delete();
      return redirect('facebookk')->with('status', 'Data Berhasil di Hapus!!!');
    }
}