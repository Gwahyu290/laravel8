<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use App\Cabang;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {   

        $cek = DB::select("select * from users where email = '$request->email' OR no_tlpn='$request->no_tlpn' ");
        if(count($cek)>0){
            return redirect('register')->with('eror','.');
        } 
        $u = new User;
            $u->name = $request->name;
            $u->level = 'Karyawan';
            $u->alamat = $request->alamat;
            $u->no_tlpn = $request->no_tlpn;
            $u->email = $request->email;
            $u->password = Hash::make($request->password);
            $u->android = $request->password;
        $u->save();
            // $artikel = new Artikel;
            // $artikel->nama = Auth()->user()->id;
            // $artikel->nama_id = Auth()->user()->name;
            // $artikel->tgl = $request->tgl;
            // $artikel->cabang_id = $cabang_id;
            // $artikel->gambar = $namafile;
            // $nm->move(public_path().'/pdf', $namafile);
            // $artikel->save();
            
        return redirect('register')->with('sukses','.');;
    }
    // public function showRegistrationForm()
    // {
    //     return view('register');
    // }
}