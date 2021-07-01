<?php

namespace App\Http\Controllers;

use App\User;
use App\Dkaryawan;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class ProfilController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $users = User::paginate(5);
        
    if ($Agent->isMobile()) {
        return view('mobile.profilkaryawan.index', compact('users'));
    } else {
        return view('profilkaryawan.index', compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $Agent = new Agent();
    $cabangs = Cabang::all();

    if ($Agent->isMobile()) {
        return view('mobile.profilkaryawan.create', compact('cabangs'));
    } else {    
        return view('profilkaryawan.create', compact('cabangs'));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required|min:3',
            'no_tlpn' => 'required|min:12',
            'cabang_id' => 'required',
        ],[
            'alamat.required' => 'Alamat Karyawan tidak boleh kosong!!!',
            'no_tlpn.required' => 'Nomor telepon Karyawan tidak boleh kosong!!!',
            'cabang_id.required' => 'Cabang Samchick tidak boleh kosong!!!'
        ]);
        // return $request;    
        $user = new User;
        $user->nama = Auth()->user()->id;
        $user->alamat = $request->alamat;
        $user->no_tlpn = $request->no_tlpn;
        $user->cabang_id = $request->cabang_id;
        $user->save();

        return redirect('profilkaryawan')->with('status', 'Profil Karyawan Berhasil di Tambah!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    $Agent = new Agent();
    $cabangs = Cabang::all();
    if ($Agent->isMobile()) {
        return view('mobile.profilkaryawan.edit', compact('user', 'cabangs'));
    } else {    
        return view('profilkaryawan.edit', compact('user', 'cabangs'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'alamat' => 'required|min:3',
            'no_tlpn' => 'required|min:12'
        ],[
            'alamat.required' => 'Alamat Karyawan tidak boleh kosong!!!',
            'no_tlpn.required' => 'Nomor telepon Karyawan tidak boleh kosong!!!',
        ]);
        // return $request;
        // cara1
        $user->alamat = $request->alamat;
        $user->no_tlpn = $request->no_tlpn;
        $user->save();

        return redirect('profilkaryawank')->with('status', 'Profil Karyawan Berhasil di Update!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dkaryawan  $dkaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('profilkaryawan')->with('status', 'Profil Karyawan Berhasil di Hapus!!!');
    }
}
