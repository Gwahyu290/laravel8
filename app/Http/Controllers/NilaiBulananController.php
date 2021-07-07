<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use DB;
class NilaiBulananController extends Controller
{
    public function index(Request $request)
    {
    $bulan1 = date("m");
    $tahun1 = date("Y");
        if($request->tahun1 != "" || $request->tahun1 != null ){
            $tahun1 = $request->tahun1;
        }if($request->bulan1 != "" || $request->bulan1 != null ){
            $bulan1 = $request->bulan1;
        }
    
        if($request->orderBy != null || $request->orderBy != ""){
            if($request->orderBy=="0"){            
                $best = DB::select("select nama_id, SUM(wa+ar+pam) as mingguan, SUM(fb+ig+gm) as harian,
                SUM(wa+ar+pam+ig+fb+gm) as bulanan, MONTH(tgl) as bulan, YEAR(tgl) as tahun from rekap where YEAR(tgl)='$tahun1'
                AND MONTH(tgl) = '$bulan1' AND nama_id LIKE '%$request->q%' group by nama_id,MONTH(tgl), YEAR(tgl) order by bulanan ASC");
            }else{    
                $best = DB::select("select nama_id, SUM(wa+ar+pam) as mingguan, SUM(fb+ig+gm) as harian,
                        SUM(wa+ar+pam+ig+fb+gm) as bulanan, MONTH(tgl) as bulan, YEAR(tgl) as tahun from rekap where YEAR(tgl)='$tahun1'
                        AND MONTH(tgl) = '$bulan1' AND nama_id LIKE '%$request->q%' group by nama_id,MONTH(tgl), YEAR(tgl) order by bulanan DESC");
            }
        }
        else{
            $best = DB::select("select nama_id, SUM(wa+ar+pam) as mingguan, SUM(fb+ig+gm) as harian,
                    SUM(wa+ar+pam+ig+fb+gm) as bulanan, MONTH(tgl) as bulan, YEAR(tgl) as tahun from rekap where YEAR(tgl)='$tahun1'
                    AND MONTH(tgl) = '$bulan1' AND nama_id LIKE '%$request->q%' group by nama_id,MONTH(tgl), YEAR(tgl)");
    
        }
        $Agent = new Agent();

    if ($Agent->isMobile()) {
        return view('mobile.ofthemoon.index',compact('best'));
    } else {
        return view('nilaibulanan.index',compact('best'));
        }
    }
    
}
