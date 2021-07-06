<?php

namespace App\Http\Controllers;
use DB;
use App\NilaiHarian;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
class NilaiHarianController extends Controller
{
    public function index(Request $request)
    {
        $harian = "";
        $tgl1 = "";
        $tgl2 = "";
        if($request->tgl1 == "" || $request->tgl1 == null ){
            $tgl1 = date("Y-m-d");
        }
        if($request->tgl1 != "" || $request->tgl1 != null ){
            $tgl1 = $request->tgl1;
            $tgl1 = str_replace("/","-",$tgl1);
            $tgl1 = date('Y-m-d',strtotime($tgl1));
            }
        if($request->tgl2 == "" || $request->tgl2 == null){
            $tgl2 = date("Y-m-d");
        }
        if($request->tgl2 != "" || $request->tgl2 != null){
            $tgl2 = $request->tgl2;
            $tgl2 = str_replace("/","-",$tgl2);
            $tgl2 = date('Y-m-d',strtotime($tgl2));
        }

        if($request->orderBy != null || $request->orderBy != ""){
            if($request->orderBy=="0"){            
                $harian = DB::select("select a.id_rekap , a.tgl , a.fb , a.gm , a.ig, b.name, (a.fb+a.gm+a.ig) as total, c.namacbg from rekap a, users b, cabangs c
                WHERE a.nama_id LIKE '%$request->q%' AND a.tgl BETWEEN  CAST('$tgl1' as DATE) AND CAST('$tgl2' as DATE) 
                AND a.nama_id = b.name AND b.cabang_id=c.id AND a.tipe=0 ORDER BY total ASC");
            }else{    
                $harian = DB::select("select a.id_rekap , a.tgl , a.fb , a.gm , a.ig, b.name, (a.fb+a.gm+a.ig) as total, c.namacbg from rekap a, users b, cabangs c
                WHERE a.nama_id LIKE '%$request->q%' AND a.tgl BETWEEN  CAST('$tgl1' as DATE) AND CAST('$tgl2' as DATE) 
                AND a.nama_id = b.name AND b.cabang_id=c.id AND a.tipe=0 ORDER BY total DESC");
            }
        }
        else{$harian = DB::select("select a.id_rekap , a.tgl , a.fb , a.gm , a.ig, b.name, (a.fb+a.gm+a.ig) as total, c.namacbg from rekap a, users b, cabangs c
            WHERE a.nama_id LIKE '%$request->q%' AND a.tgl BETWEEN  CAST('$tgl1' as DATE) AND CAST('$tgl2' as DATE) 
            AND a.nama_id = b.name AND b.cabang_id=c.id AND a.tipe=0");
        }
    $Agent = new Agent();
    if ($Agent->isMobile()) {
        return view('nilaiharian.index', compact('harian'));
    } else {
        return view('nilaiharian.index', compact('harian'));
        }
    }
}
