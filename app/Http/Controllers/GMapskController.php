<?php

namespace App\Http\Controllers;
use App\Googlemap;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class GMapskController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $googlemaps = Googlemap::where('nama','=',Auth()->user()->id)->paginate(5);
        
    if ($Agent->isMobile()) {
        return view('mobile/googlemapk/index', compact('googlemaps'));
    } else {
        return view('googlemapk.index', compact('googlemaps'));
        }
    }
}
