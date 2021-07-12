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
            return view('home',compact('data'));
    }
if(auth()->user()->level=="Karyawan"){
    
    $bulan1 = "";
    $tahun1 = "";
    $nama = auth()->user()->name;
        if($request->tahun1 != "" || $request->tahun1 != null ){
            $tahun1 = "AND  YEAR(tgl) = '$request->tahun1'";
        }if($request->bulan1 != "" || $request->bulan1 != null ){
            $bulan1 = "AND MONTH(tgl) = '$request->bulan1'";
        }
    $query = "select nama_id, SUM(wa+ar+pam) as mingguan, SUM(fb+ig+gm) as harian,
        SUM(wa+ar+pam+ig+fb+gm) as bulanan, MONTHNAME(tgl) as nmbulan,MONTH(tgl) as bulan, YEAR(tgl) as tahun from rekap where nama_id='$nama'".$tahun1.$bulan1.
        "group by MONTH(tgl), YEAR(tgl)";
    $data = DB::select($query);
}
// agent detection influences the view storage path
if ($Agent->isMobile()) {
    // you're a mobile device
        return view('mobile.home',compact('data'));
} else {
    // you're a desktop device, or something similar
        return view('home',compact('data'));
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
