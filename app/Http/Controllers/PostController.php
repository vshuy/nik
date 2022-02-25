<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facade\FlareClient\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::all();
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tmp_post = json_decode($request->post_data);
        $result = $request->file_img_post->storeOnCloudinary();
        $path = $result->getSecurePath();
        $publicId = $result->getPublicId();
        $post = new Post();
        $post->publicIdCloudinary = $publicId;
        $post->category_id = $tmp_post->category_id;
        $post->name = $tmp_post->name;
        $post->link_thumbnail = $path;
        $post->content_post = $tmp_post->content_post;
        $post->views = 0;
        $post->likes = 0;
        $post->save();
        return "good";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $result = Post::find($request->id);
        return Response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Post::find($request->id);
        $cloudinary = new Cloudinary();
        $cloudinary->uploadApi()->destroy($post->publicIdCloudinary);
        $post->delete();
    }
}
