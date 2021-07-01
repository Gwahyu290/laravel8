<?php

namespace App\Http\Controllers;

use App\Facebook;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class FacebookkController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $facebooks = Facebook::where('nama','=',Auth()->user()->id)->paginate(5);

    if ($Agent->isMobile()) {
        return view('mobile.facebookk.index', compact('facebooks'));
    } else {
        return view('facebookk.index', compact('facebooks'));
        }
    }
}