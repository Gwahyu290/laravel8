<?php

namespace App\Http\Controllers;
use DB;
use App\NilaiHarian;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
class NilaiHarianController extends Controller
{
    public function index()
    {
    $Agent = new Agent();
    $harian = DB::select("select a.id_rekap , a.tgl , a.fb , a.gm , a.ig, b.name, (a.fb+a.gm+a.ig) as total, c.namacbg from rekap a, users b, cabangs c
    WHERE a.nama_id = b.name AND b.cabang_id=c.id");
    
    if ($Agent->isMobile()) {
        return view('nilaiharian.index', compact('harian'));
    } else {
        return view('nilaiharian.index', compact('harian'));
        }
    }
}
