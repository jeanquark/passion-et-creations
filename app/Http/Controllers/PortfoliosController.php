<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Image;

class PortfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::with('images')->with('category')->orderBy('order', 'asc')->get();
        
        return response()->json([
            'portfolios' => $portfolios
        ]);
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
        // 1) Save portfolios
        $newPortfolio = new Portfolio();
        $newPortfolio->title = $request['title'];
        $newPortfolio->description = $request['description'];
        // $newPortfolio->front_image_id = $request['images'][0]['id'];
        $newPortfolio->save();

        // 2) Save images
        foreach($request->images as $image) {
            $newImage = new Image();
            $newImage->portfolio_id = $newPortfolio['id'];
            $newImage->name = $image['name'];
            $newImage->path = $image['path'];
            $newImage->height = $image['height'];
            $newImage->width = $image['width'];
            $newImage->size = $image['size'];
            $newImage->is_front_image = $image['is_front_image'];
            $newImage->save();
        }

        

        return response()->json([
            'success' => true,
            'request->all()' => $request->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request)
    {
        $portfolios = $request->all();
        foreach($portfolios as $portfolio) {
            Portfolio::where('id', $portfolio['id'])->update(['order' => $portfolio['order']]);
        }
        // $portfolios = Portfolio::update(['order' => 1]);

        return response()->json([
            'success' => true,
            'request->all()' => $request->all(),
            'portfolios' => $portfolios
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
