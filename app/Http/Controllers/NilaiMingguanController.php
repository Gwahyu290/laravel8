<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\NilaiM;
use Jenssegers\Agent\Agent as Agent;

class NilaiMingguanController extends Controller
{
  public function index()
    {
    $Agent = new Agent();
    $mingguan = DB::select("select a.id_mingguan , a.tgl , a.ar , a.wa , a.pam, b.name, (a.ar+a.wa+a.pam) as total, c.namacbg from rekapmingguan a, users b, cabangs c
    WHERE a.nama_id = b.name AND b.cabang_id=c.id");
    
    if ($Agent->isMobile()) {
        return view('mobile.nilaimingguan.index');
    } else {
        return view('nilaimingguan.index', compact('mingguan'),);
        }
    }
}
