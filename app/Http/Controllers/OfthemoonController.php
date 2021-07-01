<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
class OfthemoonController extends Controller
{
    public function index()
    {
    $Agent = new Agent();    
    if ($Agent->isMobile()) {
        return view('mobile.ofthemoon.index');
    } else {
        return view('ofthemoonk.index');
        }
    }
}
