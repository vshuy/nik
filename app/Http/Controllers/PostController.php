<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPost = DB::table('posts')
            ->select(['id', 'created_at', 'name_post', 'views'])
            ->get();
        return response()->json($listPost);
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
        $post = new Post();
        $post->name_post = $request->postname;
        // $post->time_up = $current_date_time;
        $post->contents_post = $request->content;
        $post->category_id = $request->id_category;
        $post->views = 0;
        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $detailPost = DB::table('posts')
            ->select(['name_post', 'created_at', 'views', 'contents_post'])
            ->where('id', '=', $request->id)
            ->get();
        $commentPost = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->select('comments.id', 'users.name', 'comments.contents', 'comments.created_at')
            ->where('post_id', '=', $request->id)
            ->get();
        $result = collect([
            'detail' => $detailPost,
            'listcomment' => $commentPost
        ]);
        return response()->json($result);
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
    public function destroy(Post $post)
    {
        //
    }
}
