<?php

namespace App\Http\Controllers;

use App\Models\Ram;
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
        $rams = Ram::all();
        return response()->json($rams);
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
     * @param  \App\Ram  $rams
     * @return \Illuminate\Http\Response
     */
    public function show(Ram $rams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ram  $rams
     * @return \Illuminate\Http\Response
     */
    public function edit(Ram $rams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ram  $rams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ram $rams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ram  $rams
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ram $rams)
    {
        //
    }
}
