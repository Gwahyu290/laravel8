<?php

namespace App\Http\Controllers;
use App\Whatsapp;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class WhatsappkController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $whatsapps = Whatsapp::where('nama','=',Auth()->user()->id)->paginate(5);
        
    if ($Agent->isMobile()) {
        return view('mobile.whatsappk.index', compact('whatsapps'));
    } else {
        return view('whatsappk.index', compact('whatsapps'));
        }
    }
}