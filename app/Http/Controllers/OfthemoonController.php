<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use DB;
class OfthemoonController extends Controller
{
    public function index(Request $request)
    {
    $Agent = new Agent();
    $tahun = "";
        if($request->tahun == "" || $request->tahun == null ){
            $tahun = date("Y");
        }if($request->tahun != "" || $request->tahun != null ){
            $tahun = $request->tahun;
        }

    // $best = DB::select("select nama_id, SUM(wa+ar+pam) as mingguan, SUM(fb+ig+gm) as harian,
    // SUM(wa+ar+pam+ig+fb+gm) as bulanan, MONTH(tgl) as bulan, YEAR(tgl) as tahun from rekap where YEAR(tgl) <= '$tahun2' AND YEAR(tgl) >= '$tahun1'
    // AND MONTH(tgl) >= '$bulan1' AND MONTH(tgl) <= '$bulan2' group by nama_id ORDER BY bulanan DESC");

    $nama = array("", "", "","","","","","","","","","");
    $nilai = array("", "", "","","","","","","","","","");
    $bul = array("Jan", "Feb", "Mar","Apr","Mei","Jun","Jul","Ags","Sep","Okt","Nov","Des");
    $bulan = array("1","2","3","4","5","6","7","8","9","10","11","12");
    for ($i=1; $i <= count($bulan); $i++) { 
        $best = DB::select("select nama_id, SUM(wa+ar+pam) as mingguan, SUM(fb+ig+gm) as harian,
        SUM(wa+ar+pam+ig+fb+gm) as bulanan, MONTH(tgl) as bulan, YEAR(tgl) as tahun from rekap where YEAR(tgl)='$tahun'
        AND MONTH(tgl) = '$i' group by nama_id,MONTH(tgl), YEAR(tgl) ORDER BY bulanan DESC limit 1");        
        foreach ($best as $b){
            $nama[$i-1] = $bul[$i-1].'('.$b->nama_id.')';
            $nilai[$i-1] = $b->bulanan; 
        }
    }
     if ($Agent->isMobile()) {
        return view('mobile.ofthemoon.index',compact(['nama','nilai','tahun']));
    } else {
        return view('ofthemoon.index',compact(['nama','nilai','tahun']));
        }
    }
    
}
