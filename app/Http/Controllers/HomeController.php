<?php

namespace App\Http\Controllers;

use App\Models\Seragam;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function list($id)
    {
        $Seragam = Seragam::where('kategori', $id)->get();
        return view('frontend.show', compact('Seragam'));
    }
}
