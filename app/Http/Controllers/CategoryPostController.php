<?php

namespace App\Http\Controllers;

use App\CategoryPost;
use Illuminate\Http\Request;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $name = $request->namecake;
        $descripe = $request->mota;
        $category = new CategoryPost();
        $category->name_cake = $name;
        $category->descripe = $descripe;
        $category->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryPost $categoryPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryPost $categoryPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryPost $categoryPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryPost $categoryPost)
    {
        //
    }
}
