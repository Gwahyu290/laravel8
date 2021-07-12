<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use Illuminate\Http\Request;
use Auth;
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

    public function login(Request $request)
   {
    Session::put('email', $request->email);
        	
    // dd($request->all());
   	if (Auth::attempt($request->only('email','password'))){
        $pass = md5($request->password);
        $cek = DB::select("select * from users where email='$request->email' AND password='$pass' AND status='1'");
        if(count($cek)>0){
            Session::put('email', '');
            return redirect('/home');
        }else{
            return redirect('/')->with('verif','.');
        }
   	}
   	return redirect('/')->with('salah','.');
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
