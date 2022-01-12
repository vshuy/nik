<?php

namespace App\Http\Controllers;

use App\Product;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show', 'indexPaginate', 'search']]);
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
        $list = Product::paginate(8);
        return response()->json($list);
    }
    public function search(Request $request)
    {
        $list = DB::table('products')
            ->select('products.id', 'products.name')
            ->where('products.name', 'like', '%' . $request->text . '%')
            ->get();
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
        $dataProduct = json_decode($request->product_data);
        $result = $request->file_img_product->storeOnCloudinary();
        $path = $result->getSecurePath();
        $publicId = $result->getPublicId();
        $anProduct = new Product();
        $anProduct->category_id = $dataProduct->category_id;
        $anProduct->name = $dataProduct->name;
        $anProduct->link_thumbnail = $path;
        $anProduct->publicIdCloudinary = $publicId;
        $anProduct->cost = $dataProduct->cost;
        $anProduct->old_cost = $dataProduct->cost;
        $anProduct->content_post = $dataProduct->content_post;
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
        $detailProduct = Product::find($request->id);
        return response()->json($detailProduct);
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
        $anProduct = Product::find($request->id);
        $anProduct->category_id = $request->category_id;
        $anProduct->name = $request->name;
        $anProduct->cost = $request->cost;
        $anProduct->content_post = $request->content_post;
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
        $aProduct = Product::find($request->id);
        $cloudinary = new Cloudinary();
        $cloudinary->uploadApi()->destroy($aProduct->publicIdCloudinary);
        $aProduct->delete();
    }
}
