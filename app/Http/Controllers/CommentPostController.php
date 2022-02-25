<?php

namespace App\Http\Controllers;

use App\Model\CommentPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentPostController extends Controller
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
         // $user_id = $request->user_id;
         $user_id = auth('api')->user()->id;
         $post_id = $request->post_id;
         $data_comment = $request->contents;
         $comment = new CommentPost();
         $comment->user_id = $user_id;
         $comment->post_id = $post_id;
         $comment->contents = $data_comment;
         $comment->save();
         return Response()->json($comment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommentPost  $commentPost
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $comments = DB::table('comment_posts')
            ->join('users', 'users.id', '=', 'comment_posts.user_id')
            ->select('comment_posts.id', 'comment_posts.user_id', 'users.name', 'comment_posts.contents')
            ->where('post_id', '=', $request->id)
            ->get();
        return Response()->json($comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommentPost  $commentPost
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentPost $commentPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommentPost  $commentPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommentPost $commentPost)
    {
        $comment = CommentPost::find($request->id);
        $comment->contents = $request->contents;
        $comment->save();
        return Response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommentPost  $commentPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $comment = CommentPost::find($request->id);
        $comment->delete();
        return Response()->json(true);
    }
}
