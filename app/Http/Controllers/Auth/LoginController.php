<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function login(Request $request){
        Session::put('email', $request->email);
        $pass = md5($request->password);
        // dd($request->all());
        $cek = DB::select("select * from users where email='$request->email'");
        if(count($cek) > 0){
            foreach ($cek as $c){
                if($c->status==1 && Hash::check($request->password, $c->password)){
                    if(Auth::attempt($request->only('email','password'))){
                        Session::put('email', '');
                        return redirect('/home');
                    }
                }else if($c->status==0){
                    return redirect('/')->with('verif','.'); 
                }else{
                    return redirect('/')->with('salah','.'); 
                }
            };
        }
        
        // if(Auth::attempt($request->only('email','password'))){
        //     if(auth()->user()->status > 0 || auth()->user()->status != '0' ){
        //         Session::put('email', '');
        //         return redirect('/home');
        //     }else{
        //         return redirect('/')->with('verif','.');
        //     }
        // }   
        // return redirect('/')->with('salah','.');
        
   }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
}
