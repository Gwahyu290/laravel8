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
    $bulan1 = "";
    $bulan2 = "";
    $tahun1 = "";
    $tahun2 = "";
        if($request->tahun1 == "" || $request->tahun1 == null ){
            $tahun1 = date("Y");
        }if($request->tahun1 != "" || $request->tahun1 != null ){
            $tahun1 = $request->tahun1;
        }if($request->tahun2 == "" || $request->tahun2 == null ){
            $tahun2 = date("Y");
        }if($request->tahun2 != "" || $request->tahun2 != null ){
            $tahun2 = $request->tahun2;
        }if($request->bulan1 == "" || $request->bulan1 == null ){
            $bulan1 = date("m");
        }if($request->bulan1 != "" || $request->bulan1 != null ){
            $bulan1 = $request->bulan1;
        }if($request->bulan2 == "" || $request->bulan2 == null ){
            $bulan2 = date("m");
        }if($request->bulan2 != "" || $request->bulan2 != null ){
            $bulan2 = $request->bulan2;
        }

    $best = DB::select("select nama_id, SUM(wa+ar+pam) as mingguan, SUM(fb+ig+gm) as harian,
    SUM(wa+ar+pam+ig+fb+gm) as bulanan, MONTH(tgl) as bulan, YEAR(tgl) as tahun from rekap where YEAR(tgl) <= '$tahun2' AND YEAR(tgl) >= '$tahun1'
    AND MONTH(tgl) >= '$bulan1' AND MONTH(tgl) <= '$bulan2' group by nama_id ORDER BY bulanan DESC");

    // $best = DB::select("select nama_id, SUM(wa+ar+pam) as mingguan, SUM(fb+ig+gm) as harian,
    // SUM(wa+ar+pam+ig+fb+gm) as bulanan, MONTH(tgl) as bulan, YEAR(tgl) as tahun from rekap where YEAR(tgl)=YEAR(now())
    // AND MONTH(tgl) = MONTH(now()) group by nama_id,MONTH(tgl), YEAR(tgl) ORDER BY bulanan DESC");
     if ($Agent->isMobile()) {
        return view('mobile.ofthemoon.index',compact('best'));
    } else {
        return view('ofthemoon.index',compact('best'));
        }
    }
    
}
