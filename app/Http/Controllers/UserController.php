<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
class UserController extends Controller
{
    public function index(Request $request)
    {
    
    $Agent = new Agent();
    $users = User::paginate(20);
    if ($Agent->isMobile()) {
        return view('mobile.user.index', compact('users'));
    } else {
        return view('user.index', compact('users'));
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
        return view('mobile.user.create', compact('cabangs'));
    } else {
        return view('user.create', compact('cabangs'));
        }
    }

    public function edit(User $user)
    {
        if(auth()->user()->level=="Karyawan"){
        $cabangs = Cabang::all();
        return view('user.edit',compact('cabangs','user'));
        }
        $cabangs = Cabang::all();
        return view('user.edit', compact('user','cabangs'));
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
            'alamat' => 'required',
            'no_tlpn' => 'required'
        ],[
            'name.required' => 'Nama Karyawan tidak boleh kosong!!!',
            'alamat.required' => 'Alamat Karyawan tidak boleh kosong!!!',
            'no_tlpn.required' => 'No Ponsel  tidak boleh kosong!!!'
        ]);
        // return $request;
        // cara1
        $user->alamat = $request->alamat;
        $user->no_tlpn = $request->no_tlpn;
        $user->save();
        if(auth()->user()->level=="Admin"){
        return redirect('user')->with('status', 'Profil Karyawan Berhasil di Edit!!!');
    }
    if(auth()->user()->level=="Karyawan"){
        return redirect('userk')->with('status', 'Profil Karyawan Berhasil di Edit!!!');
    }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('user')->with('status', 'Data Berhasil di Hapus!!!');
    }
}
