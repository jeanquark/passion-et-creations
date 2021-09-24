<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Slider;
use App\Models\SliderImage;


class SlidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::with('slider_images')->get();
        // $sliders = Slider::with('slider_images')
        //     ->join('slider_images', 'sliders.id', '=', 'slider_images.slider_id')
        //     ->orderBy('slider_images.order', 'ASC')
        //     ->get();

        return response()->json($sliders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::where('id', '=', $id)->firstOrFail();

        // 1) Dissociate all existing relations
        foreach ($slider->slider_images as $image) {
            $image->delete();
        }

        // 2) Associate new relation
        foreach ($request->sliderImages as $image) {
            $newImage = new SliderImage();
            $newImage->slider_id = $id;
            $newImage->image_path = $image['image_path'];
            $newImage->order = $image['order'];
            // $newImage->updated_at = 
            $newImage->save();
        }

        return response()->json([
            'success' => true,
            'id' => $id,
            'request->all()' => $request->all(),
            'request->sliderImages' => $request->sliderImages
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }
}
