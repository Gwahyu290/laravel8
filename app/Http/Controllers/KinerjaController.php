<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use DB;

class KinerjaController extends Controller
{
    public function index(Request $request)
    {
$Agent = new Agent();
$data = [];
    $bulan1 = "";
    $tahun1 = "";
    $nama = auth()->user()->name;
        if($request->tahun1 != "" || $request->tahun1 != null ){
            $tahun1 = " AND  YEAR(tgl) = '$request->tahun1'";
        }if($request->bulan1 != "" || $request->bulan1 != null ){
            $bulan1 = " AND MONTH(tgl) = '$request->bulan1'";
        }
        $query = "select nama_id as name, SUM(wa+ar+pam) as mingguan, 
                SUM(fb+ig+gm) as harian,
                SUM(wa+ar+pam+ig+fb+gm) as bulanan,
                ROUND(
                (SUM(ig+wa+pam+ar+gm+fb)/
                ((select count(id) from instagrams where nama_id=name".$tahun1.$bulan1.")+
                (select count(id) from artikels where nama_id=name".$tahun1.$bulan1.")+
                (select count(id) from googlemaps where nama_id=name".$tahun1.$bulan1.")+
                (select count(id) from facebooks where nama_id=name".$tahun1.$bulan1.")+
                (select count(id) from pamflets where nama_id=name ".$tahun1.$bulan1.")+
                (select count(id) from whatsapps where nama_id=name ".$tahun1.$bulan1.")
                )),1) as hasil,
                ((select count(id) from instagrams where nama_id=name ".$tahun1.$bulan1.")+
                (select count(id) from artikels where nama_id=name ".$tahun1.$bulan1.")+
                (select count(id) from googlemaps where nama_id=name ".$tahun1.$bulan1.")+
                (select count(id) from facebooks where nama_id=name ".$tahun1.$bulan1.")+
                (select count(id) from pamflets where nama_id=name ".$tahun1.$bulan1.")+
                (select count(id) from whatsapps where nama_id=name ".$tahun1.$bulan1.")
                ) as jmltugas, MONTH(tgl) as bulan, MONTHNAME(tgl) as nmbulan, YEAR(tgl) as tahun  
                from rekap where nama_id='$nama'".$tahun1.$bulan1."group by MONTH(tgl), YEAR(tgl)";
    $data = DB::select($query);

// agent detection influences the view storage path
if ($Agent->isMobile()) {
    // you're a mobile device
        return view('mobile.kinerja.index',compact('data'));
} else {
    // you're a desktop device, or something similar
        return view('kinerja.index',compact('data'));
}
    }
    public function accProcess(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update([
            'cabang_id' => $request->cabang,
            'status'=>1
        ]);
        return redirect('accakun')->with('status', 'Karyawan telah diverifikasi!!!');
    }
    public function store(Request $request){

    }
}
