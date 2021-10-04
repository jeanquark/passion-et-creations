<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\PortfolioImage;

class PortfoliosController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:admin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::with('portfolio_images')->with('category')->orderBy('order', 'asc')->get();
        
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
        $request->validate([
            'title' => ['required'],
            // 'description' => ['required']
        ]);

        // 1) Save portfolios
        $newPortfolio = new Portfolio();
        $newPortfolio->title = $request->title;
        $newPortfolio->description = $request->description;
        $newPortfolio->save();

        // 2) Save images
        foreach($request->images as $image) {
            $newImage = new PortfolioImage();
            $newImage->portfolio_id = $newPortfolio['id'];
            $newImage->name = $image['name'];
            $newImage->path = $image['path'];
            $newImage->thumbnail_path = $image['thumbnail_path'];
            $newImage->height = $image['height'];
            $newImage->width = $image['width'];
            $newImage->size = $image['size'];
            $newImage->is_front_image = $image['is_front_image'];
            $newImage->order = $image['order'];
            $newImage->save();
        }

        return response()->json([
            'success' => true,
            'request->all()' => $request->all(),
            'request->description' => $request->description

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
            'portfolios' => $portfolios,
        ]);
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
        $validatedData = $request->validate([
            'title' => ['required'],
        ]);

        $portfolio = Portfolio::find($id);

        $portfolio->updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => \Carbon\Carbon::now(),
            ]
        );

        $portfolioImages = PortfolioImage::where('portfolio_id', '=', $id)->get();

        // $portfolio->portfolio_images()->dissociate();
        // $portfolio->portfolio_images()->associate($request->portfolio_images);

        // 1) Dissociate all existing relations
        foreach ($portfolioImages as $image) {
            $image->delete();
        }

        // 2) Associate new relation
        foreach ($request->portfolio_images as $image) {
            $newImage = new PortfolioImage();
            $newImage->portfolio_id = $id;
            $newImage->name = $image['name'];
            $newImage->path = $image['path'];
            $newImage->thumbnail_path = $image['thumbnail_path'];
            $newImage->height = $image['height'];
            $newImage->width = $image['width'];
            $newImage->size = $image['size'];
            $newImage->is_front_image = $image['is_front_image'];
            $newImage->order = $image['order'];
            $newImage->save();
        }

        return response()->json([
            'success' => true,
            'id' => $id,
            'portfolio' => $portfolio,
            'request->all()' => $request->all(),
            '$request->portfolio_images' => $request->portfolio_images,
            'portfolioImages' => $portfolioImages
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Portfolio::where('id', '=', $id)->delete();

        return response()->json([
            'success' => true,
            'id' => $id
        ]);
    }
}
