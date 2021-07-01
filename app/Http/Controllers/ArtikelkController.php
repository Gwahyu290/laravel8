<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Cabang;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class ArtikelkController extends Controller
{
    public function index()
    {
    $Agent = new Agent();

    $artikels = Artikel::where('nama','=',Auth()->user()->id)->paginate(5);

    if ($Agent->isMobile()) {
        return view('mobile.artikelk.index', compact('artikels'));
    } else {
        return view('artikelk.index', compact('artikels'));
        }
    }
}