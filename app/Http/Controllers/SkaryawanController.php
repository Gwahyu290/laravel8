<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkaryawanController extends Controller
{
    public function data()
    {
    	$skaryawans = DB::table('skaryawans')->paginate(5);
    	//dd($dkaryawan);
    	//return $dkaryawan;
    	//return view('dkaryawan.data',['dkaryawan'=> $dkaryawan]);
    	return view('skaryawan.data',compact('skaryawans'));
    }
    public function add()
    {
    	return view('skaryawan.add');
    }
    public function addProcess(Request $request)
    {
        $request->validate([
            'status' => 'required|min:3',
        ],[
            'status.required' => 'Status Karyawan tidak boleh kosong!!!'
        ]);

    	DB::table('skaryawans')->insert([
    		'status' => $request->status
    	]);
    	return redirect('skaryawan')->with('status', 'Status karyawan Berhasil Ditambah!!!');
    }
    public function edit($id)
    {
    	$karyawan = DB::table('skaryawans')->where('id', $id)->first();
    	return view('skaryawan/edit', compact('karyawan'));
    }
    public function editProcess(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|min:3',
        ],[
            'status.required' => 'Status Karyawan tidak boleh kosong!!!'
        ]);
    	DB::table('skaryawans')->where('id', $id)->update([
    		'status' => $request->status
    	]);
    	return redirect('skaryawan')->with('status', 'Data karyawan Berhasil update!!!');
    }
    public function delete($id)
    {
    	DB::table('skaryawans')->where('id', $id)->delete();
    	return redirect('skaryawan')->with('status', 'Data Karyawan berhasil dihapus!!!');
    }
}
