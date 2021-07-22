<?php

namespace App\Http\Controllers;
use App\Googlemap;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use DB;

class GMapskController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $googlemaps = Googlemap::where('nama','=',Auth()->user()->id)->paginate(15);
        
    if ($Agent->isMobile()) {
        return view('mobile/googlemapk/index', compact('googlemaps'));
    } else {
        return view('googlemapk.index', compact('googlemaps'));
        }
    }
    public function store(Request $request)
    {
       $request->validate([
            'gambargm' => 'required',
            'link' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ],[
            'gambargm.required' => 'Gambar Tugas tidak boleh kosong!!!',
            'link.required' => 'Link Tugas tidak boleh kosong!!!'
        ]);
        // return $request;
        $cabang_id = Auth()->user()->id;
            $cabang = DB::select("select * from users where id='$cabang_id'");
            foreach ($cabang as $c){
            $cabang_id = $c->cabang_id;
            }

            $nm = $request->gambargm;
            $namafile = $nm->getClientOriginalName();
        
            $googlemap = new Googlemap;
            $googlemap->nama = Auth()->user()->id;
            $googlemap->nama_id = Auth()->user()->name;
            $googlemap->tgl = date('Y-m-d');
            $googlemap->cabang_id = $cabang_id;
            $googlemap->link = $request->link;
            $googlemap->gambargm = $namafile;
            $nm->move(public_path().'/map', $namafile);
            $googlemap->save();

        return redirect('googlemapk')->with('status', 'Laporan Google Views Berhasil di Serahkan!!!');
    }
    public function destroy($id,Googlemap $googlemap)
    {
        $googlemap->where('id',$id)->delete();
      return redirect('googlemapk')->with('status', 'Data Berhasil di Hapus!!!');
    }
}
