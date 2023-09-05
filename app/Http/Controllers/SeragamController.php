<?php

namespace App\Http\Controllers;

use App\Models\Seragam;
use Illuminate\Http\Request;

class SeragamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seragam = Seragam::all();
        return view('seragam.index', compact('seragam'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Seragam $seragam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seragam $seragam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seragam $seragam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seragam $seragam)
    {
        //
    }
}
