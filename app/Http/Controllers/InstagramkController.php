<?php

namespace App\Http\Controllers;

use App\Instagram;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class InstagramkController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $instagrams = Instagram::where('nama','=',Auth()->user()->id)->paginate(5);
        
    if ($Agent->isMobile()) {
        return view('mobile.instagramk.index', compact('instagrams'));
    } else {
        return view('instagramk.index', compact('instagrams'));
        }
    }
}
