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
                $best = DB::select("select nama_id as name, SUM(wa+ar+pam) as mingguan, 
                SUM(fb+ig+gm) as harian,
                SUM(wa+ar+pam+ig+fb+gm) as bulanan,
                ROUND(
                (SUM(ig+wa+pam+ar+gm+fb)/
                ((select count(id) from instagrams where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from artikels where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from googlemaps where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from facebooks where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from pamflets where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from whatsapps where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)
                )),1) as hasil,
                ((select count(id) from instagrams where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from artikels where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from googlemaps where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from facebooks where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from pamflets where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from whatsapps where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)
                ) as jmltugas, MONTH(tgl) as bulan, YEAR(tgl) as tahun  
                from rekap where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' group by nama_id order by hasil ASC");
            }else{    
                $best = DB::select("select nama_id as name, SUM(wa+ar+pam) as mingguan, 
                SUM(fb+ig+gm) as harian,
                SUM(wa+ar+pam+ig+fb+gm) as bulanan,
                ROUND(
                (SUM(ig+wa+pam+ar+gm+fb)/
                ((select count(id) from instagrams where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from artikels where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from googlemaps where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from facebooks where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from pamflets where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from whatsapps where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)
                )),1) as hasil,
                ((select count(id) from instagrams where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from artikels where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from googlemaps where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from facebooks where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from pamflets where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from whatsapps where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)
                ) as jmltugas, MONTH(tgl) as bulan, YEAR(tgl) as tahun  
                from rekap where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' group by nama_id order by hasil DESC");
            }
        }
        else{
            $best = DB::select("select nama_id as name, SUM(wa+ar+pam) as mingguan, 
                SUM(fb+ig+gm) as harian,
                SUM(wa+ar+pam+ig+fb+gm) as bulanan,
                ROUND(
                (SUM(ig+wa+pam+ar+gm+fb)/
                ((select count(id) from instagrams where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from artikels where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from googlemaps where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from facebooks where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from pamflets where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from whatsapps where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)
                )),1) as hasil,
                ((select count(id) from instagrams where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from artikels where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from googlemaps where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from facebooks where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from pamflets where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)+
                (select count(id) from whatsapps where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' and nama_id=name)
                ) as jmltugas, MONTH(tgl) as bulan, YEAR(tgl) as tahun 
                from rekap where MONTH(tgl)='$bulan1' and YEAR(tgl)='$tahun1' group by nama_id");
        }
        $Agent = new Agent();

    if ($Agent->isMobile()) {
        return view('mobile.nilaibulanan.index',compact('bulan1','tahun1','best'));
    } else {
        return view('nilaibulanan.index',compact('bulan1','tahun1','best'));
        }
    }
    
}
