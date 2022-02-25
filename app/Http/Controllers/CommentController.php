<?php

namespace App\Http\Controllers;

use App\Product;
use App\Models\Comment;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\DB;
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
        $this->validate($request, [
            'product_id' => 'required',
            'contents' => 'required',
        ]);
        $user_id = auth('api')->user()->id;
        $comment = new Comment();
        $comment->user_id = $user_id;
        $comment->product_id = $request->product_id;
        $comment->contents = $request->contents;
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
        $result = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->select('comments.id', 'comments.user_id', 'users.name', 'comments.contents')
            ->where('product_id', '=', $request->id)
            ->get();
        // $result = Comment::with(['user:id,name', 'product' => function ($query) {
        //     $query->where('id', 1);
        // }])->get();
        return Response()->json($result);
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
        $this->validate($request, [
            'contents' => 'required',
        ]);
        $comment = Comment::find($request->id);
        $comment->contents = $request->contents;
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
        $comment = Comment::find($request->id)->delete();
        return Response()->json(true);
    }
}
