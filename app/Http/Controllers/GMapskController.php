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

    $googlemaps = Googlemap::where('nama','=',Auth()->user()->id)->paginate(5);
        
    if ($Agent->isMobile()) {
        return view('mobile/googlemapk/index', compact('googlemaps'));
    } else {
        return view('googlemapk.index', compact('googlemaps'));
        }
    }
    public function store(Request $request)
    {
       $request->validate([
            'tgl' => 'required|min:3',
            'link' => 'required',
        ],[
            'tgl.required' => 'Alamat Karyawan tidak boleh kosong!!!',
            'link.required' => 'Link Tugas tidak boleh kosong!!!'
        ]);
        // return $request;
        $cabang_id = Auth()->user()->id;
            $cabang = DB::select("select * from users where id='$cabang_id'");
            foreach ($cabang as $c){
            $cabang_id = $c->cabang_id;
            }

            $nm = $request->gambargm;
        $nm1 = $request->gambargm1;
        $nm2 = $request->gambargm2;
            $namafile = $nm->getClientOriginalName();
            $namafile1 = $nm1->getClientOriginalName();
            $namafile2 = $nm2->getClientOriginalName();
        
            $googlemap = new Googlemap;
            $googlemap->nama = Auth()->user()->id;
            $googlemap->nama_id = Auth()->user()->name;
            $googlemap->tgl = $request->tgl;
            $googlemap->cabang_id = $cabang_id;
            $googlemap->link = $request->link;
            $googlemap->gambargm = $namafile;
            $nm->move(public_path().'/map', $namafile);
            $googlemap->link1 = $request->link1;
            $googlemap->gambargm1 = $namafile1;
            $nm1->move(public_path().'/map', $namafile1);
            $googlemap->link2 = $request->link2;
            $googlemap->gambargm2 = $namafile2;
            $nm2->move(public_path().'/map', $namafile2);
            $googlemap->save();

        return redirect('googlemapk')->with('status', 'Laporan Google Views Berhasil di Serahkan!!!');
    }
    public function destroy($id,Googlemap $googlemap)
    {
        $googlemap->where('id',$id)->delete();
      return redirect('googlemapk')->with('status', 'Data Berhasil di Hapus!!!');
    }
}
