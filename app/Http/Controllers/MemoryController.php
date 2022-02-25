<?php

namespace App\Http\Controllers;

use App\Model\Memory;
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
        $memories = Memory::all();
        return response()->json($memories);
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
     * @param  \App\Memory  $memories
     * @return \Illuminate\Http\Response
     */
    public function show(Memory $memories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Memory  $memories
     * @return \Illuminate\Http\Response
     */
    public function edit(Memory $memories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Memory  $memories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Memory $memories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Memory  $memories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memory $memories)
    {
        //
    }
}
