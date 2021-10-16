<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use PHP_CodeSniffer\Tokenizers\Comment as TokenizersComment;

class CommentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['index']]);
    // }
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
        $user_id = $request->user_id;
        $product_id = $request->product_id;
        $data_comment = $request->data_comment;
        $comment = new Comment();
        $comment->user_id = $user_id;
        $comment->product_id = $product_id;
        $comment->contents = $data_comment;
        $comment->save();
        return Response()->json($comment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->contents = $request->data_comment;
        $comment->save();
        return Response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $aComment = Comment::find($request->id);
        $aComment->delete();
        return Response()->json(true);
    }
}
