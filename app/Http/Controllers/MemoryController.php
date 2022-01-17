<?php

namespace App\Http\Controllers;

use App\memories;
use Illuminate\Http\Request;

class MemoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listMemory = memories::all();
        return response()->json($listMemory);
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
     * @param  \App\memories  $memories
     * @return \Illuminate\Http\Response
     */
    public function show(memories $memories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\memories  $memories
     * @return \Illuminate\Http\Response
     */
    public function edit(memories $memories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\memories  $memories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, memories $memories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\memories  $memories
     * @return \Illuminate\Http\Response
     */
    public function destroy(memories $memories)
    {
        //
    }
}
