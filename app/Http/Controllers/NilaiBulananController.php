<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use DB;
class NilaiBulananController extends Controller
{
    public function index()
    {
    $Agent = new Agent();    
    $best = DB::select("select nama_id, SUM(wa+ar+pam) as mingguan, SUM(fb+ig+gm) as harian,
    SUM(wa+ar+pam+ig+fb+gm) as bulanan, MONTH(tgl) as bulan, YEAR(tgl) as tahun from rekap where YEAR(tgl)=YEAR(now())
    AND MONTH(tgl) = MONTH(now()) group by nama_id,MONTH(tgl), YEAR(tgl) ORDER BY bulanan DESC");
    if ($Agent->isMobile()) {
        return view('mobile.ofthemoon.index',compact('best'));
    } else {
        return view('nilaibulanan.index',compact('best'));
        }
    }
    
}
