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
    if($request->orderBy != null || $request->orderBy != ""){
        if($request->orderBy=="0"){            
            $users = User::where('name','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
            ->paginate(20);
        }else{    
            $users = User::where('name','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
            ->paginate(20);     
        }
    }
    else{
        $users = User::where('name','like','%'.$request->q.'%')->where('cabang_id','like','%'.$request->cabang_id.'%')
            ->paginate(20);
    }
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
        $Agent = new Agent();

        $cabangs = Cabang::all();
    
        if ($Agent->isMobile()) {
            return view('mobile.user.edit', compact('user','cabangs'));
        } else {
            return view('user.edit', compact('user','cabangs'));
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
            'alamat' => 'required',
            'no_tlpn' => 'required'
        ],[
            'name.required' => 'Nama Karyawan tidak boleh kosong!!!',
            'alamat.required' => 'Alamat Karyawan tidak boleh kosong!!!',
            'no_tlpn.required' => 'No Ponsel  tidak boleh kosong!!!'
        ]);
        // return $request;
        // cara1
        if(auth()->user()->level=="Admin"){
            $user->cabang_id = $request->cabang_id;
        }
        $user->name = $request->name;
        $user->email = $request->email;
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
