<?php

namespace App\Http\Controllers;
use App\Pamflet;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class PamfletkController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $pamflets = Pamflet::where('nama','=',Auth()->user()->id)->paginate(5);
        
    if ($Agent->isMobile()) {
        return view('mobile.pamfletk.index', compact('pamflets'));
    } else {
        return view('pamfletk.index', compact('pamflets'));
        }
    }

}
