<?php

namespace App\Http\Controllers;

use App\Cabang;
use App\User;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class UserkController extends Controller
{
    public function index(Request $request)
    {
    
    $Agent = new Agent();
    $users = User::where('id','=',Auth()->user()->id)->paginate(5);
    if ($Agent->isMobile()) {
        return view('mobile.userk.index', compact('users'));
    } else {
        return view('userk.index', compact('users'));
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
        return view('mobile.userk.create', compact('cabangs'));
    } else {
        return view('userk.create', compact('cabangs'));
        }
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('userk.show', compact('user'));
    }

    public function edit(User $user)
    {
        $Agent = new Agent();
    
        $cabangs = Cabang::all();
    
        if ($Agent->isMobile()) {
            return view('mobile.userk.edit', compact('cabangs'));
        } else {
            return view('userk.edit', compact('cabangs'));
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
            'name' => 'required',
            'alamat' => 'required',
            'no_tlpn' => 'required'
        ],[
            'name.required' => 'Nama Karyawan tidak boleh kosong!!!',
            'alamat.required' => 'Alamat Karyawan tidak boleh kosong!!!',
            'no_tlpn.required' => 'No Ponsel  tidak boleh kosong!!!'
        ]);
        // return $request;
        // cara1
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->no_tlpn = $request->no_tlpn;
        $user->save();

        return redirect('userk')->with('status', 'Profil Karyawan Berhasil di Edit!!!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('userk')->with('status', 'Data Berhasil di Hapus!!!');
    }
}
