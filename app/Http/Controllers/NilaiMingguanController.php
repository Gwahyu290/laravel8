<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class NilaiMingguanController extends Controller
{
  public function index()
    {
    $Agent = new Agent();
    $mingguan = DB::select("select a.id_rekap , a.tgl , a.ar , a.wa , a.pam, b.name, (a.ar+a.wa+a.pam) as total, c.namacbg from rekap a, users b, cabangs c
    WHERE a.nama_id = b.name AND b.cabang_id=c.id AND tipe=1");
    
    if ($Agent->isMobile()) {
        return view('nilaimingguan.index', compact('mingguan'),);
    } else {
        return view('nilaimingguan.index', compact('mingguan'),);
        }
    }
}
