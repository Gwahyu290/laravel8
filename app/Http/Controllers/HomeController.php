<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jenssegers\Agent\Agent as Agent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
$Agent = new Agent();

// agent detection influences the view storage path
if ($Agent->isMobile()) {
    // you're a mobile device
        return view('mobile.home');
} else {
    // you're a desktop device, or something similar
        return view('home');
}
    }
}
