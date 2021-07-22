<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jenssegers\Agent\Agent as Agent;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
$Agent = new Agent();
$data = [];
if(auth()->user()->level=="Admin"){
    $data = DB::select("select * from users where status = 0");
    }
if(auth()->user()->level=="Karyawan"){
    
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
}
// agent detection influences the view storage path
if(auth()->user()->level=="Admin"){
    if ($Agent->isMobile()) {
        // you're a mobile device
            return view('mobile.home',compact('data'));
    } else {
        // you're a desktop device, or something similar
            return view('home',compact('data'));
    }
}
if(auth()->user()->level=="Karyawan"){
    if ($Agent->isMobile()) {
        // you're a mobile device
            return view('mobile.home',compact('nama','nilai','tahun'));
    } else {
        // you're a desktop device, or something similar
            return view('home',compact('nama','nilai','tahun'));
    }
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
}
