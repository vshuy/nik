<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SlideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = null;
        $slides_rd = Redis::get('slides_');
        if (isset($slides_rd)) {
            $slides = json_decode($slides_rd, true);
        } else {
            $slides = Slide::all();
            Redis::set('slides_', json_encode($slides));
        }
        return response()->json($slides);
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
        $result = $request->fileSlide->storeOnCloudinary();
        $path = $result->getSecurePath();
        $publicId = $result->getPublicId();
        $slide = new Slide();
        $slide->publicIdCloudinary = $publicId;
        $slide->title = $request->nameSlide;
        $slide->urlimg = $path;
        $slide->save();
        return Response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $slide = Slide::find($request->id);
        $cloudinary = new Cloudinary();
        $cloudinary->uploadApi()->destroy($slide->publicIdCloudinary);
        $slide->delete();
    }
}
