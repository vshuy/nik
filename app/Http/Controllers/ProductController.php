<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show', 'indexPaginate']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Product::all();
        return response()->json($list);
    }
    public function indexPaginate()
    {
        $list = Product::paginate(4);
        return response()->json($list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //----------------IGNORE---------------
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $file = $request->file_img_product;
        $result = $request->file_img_product->storeOnCloudinary();
        $path = $result->getSecurePath();
        // $path = $file->store('imgcake');
        $anProduct = new Product();
        $anProduct->category_id = $request->id_category;
        $anProduct->name = $request->nameProduct;
        $anProduct->urlimg = $path;
        $anProduct->cost = $request->cost;
        $anProduct->contents_post = $request->post_data;
        $anProduct->save();
        return Response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $listComment = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->select('comments.id', 'users.name', 'comments.contents')
            ->where('product_id', '=', $request->id)
            ->get();
        $detailProduct = DB::table('products')
            ->where('id', '=', $request->id)
            ->get();
        $result = collect([
            "product" => $detailProduct,
            "list_comment" => $listComment,
        ]);
        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $anProduct = Product::find($request->id_product);
        $anProduct->category_id = $request->id_category;
        $anProduct->name = $request->nameProduct;
        $anProduct->cost = $request->cost;
        $anProduct->contents_post = $request->post_data;
        $anProduct->save();
        return Response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $aCake = Product::find($request->id);
        $aCake->delete();
    }
}
