<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class ProfilkController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $users = User::where('id','=',Auth()->user()->id)->paginate(5);
        
    if ($Agent->isMobile()) {
        return view('mobile.profilkaryawank.index', compact('users'));
    } else {
        return view('profilkaryawank.index', compact('users'));
        }
    }

}
