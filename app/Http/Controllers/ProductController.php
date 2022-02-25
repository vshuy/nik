<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductCreateRequest;

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
        $products = Product::all();
        return response()->json($products);
    }
    public function indexPaginate(Request $request)
    {
        $products = Product::query()
            ->brand($request)
            ->ram($request)
            ->battery($request)
            ->memory($request)
            ->asc($request)
            ->desc($request)
            ->paginate(8);
        return response()->json($products);
    }
    public function search(Request $request)
    {
        $products = DB::table('products')
            ->select('products.id', 'products.name')
            ->where('products.name', 'like', '%' . $request->text . '%')
            ->get();
        return response()->json($products);
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
    public function store(ProductCreateRequest $request)
    {
        $dataProduct = json_decode($request->product_data);
        $result = $request->file_img_product->storeOnCloudinary();
        $path = $result->getSecurePath();
        $publicId = $result->getPublicId();
        $product = new Product();
        $product->category_id = $dataProduct->category_id;
        $product->brand_id = $dataProduct->brand_id;
        $product->memory_id = $dataProduct->memory_id;
        $product->ram_id = $dataProduct->ram_id;
        $product->display_id = $dataProduct->display_id;
        $product->battery_id = $dataProduct->battery_id;
        $product->operating_system_id = $dataProduct->operating_system_id;
        $product->name = $dataProduct->name;
        $product->quantity = $dataProduct->quantity;
        $product->link_thumbnail = $path;
        $product->publicIdCloudinary = $publicId;
        $product->cost = $dataProduct->cost;
        $product->old_cost = $dataProduct->old_cost;
        $product->content_post = $dataProduct->content_post;
        $product->save();
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
        // $detailProduct = Product::find($request->id);
        $product = Product::with(['brand', 'memory', 'ram', 'category', 'display', 'battery', 'opera'])->find($request->id);
        return response()->json($product);
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
        $product = Product::find($request->id);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->memory_id = $request->memory_id;
        $product->ram_id = $request->ram_id;
        $product->display_id = $request->display_id;
        $product->battery_id = $request->battery_id;
        $product->operating_system_id = $request->operating_system_id;
        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->old_cost = $request->old_cost;
        $product->quantity = $request->quantity;
        $product->content_post = $request->content_post;
        $product->save();
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
        $product = Product::find($request->id);
        $cloudinary = new Cloudinary();
        $cloudinary->uploadApi()->destroy($product->publicIdCloudinary);
        $product->delete();
    }
}
