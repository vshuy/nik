<?php

namespace App\Http\Controllers;

use App\rams;
use Illuminate\Http\Request;

class RamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listRam = rams::all();
        return response()->json($listRam);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rams  $rams
     * @return \Illuminate\Http\Response
     */
    public function show(rams $rams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rams  $rams
     * @return \Illuminate\Http\Response
     */
    public function edit(rams $rams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rams  $rams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rams $rams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rams  $rams
     * @return \Illuminate\Http\Response
     */
    public function destroy(rams $rams)
    {
        //
    }
}
