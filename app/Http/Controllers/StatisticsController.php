<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistic;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statistics = Statistic::orderBy('clicks', 'desc')->get();
        
        return response()->json($statistics);
        // return response()->json([
        //     'portfolios' => $portfolios
        // ]);
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
        Statistic::updateOrInsert(
            ['section' => $request->section, 'element_id' => $request->element_id],
            [
                'element_name' => $request->element_name,
                'element_path' => $request->element_path
            ]
        )->increment('clicks');

        return response()->json([
            'success' => true,
            'request->all()' => $request->all(),
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
    public function resetOne(Request $request, $id)
    {
        $statistic = Statistic::where('id', '=', $id)->update(['clicks' => 0, 'reset_at' => \Carbon\Carbon::now()]);
        sleep(3);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resetAll(Request $request)
    {
        $statistics = Statistic::all();
        foreach ($statistics as $statistic) {
            $statistic->update(['clicks' => 0, 'reset_at' => \Carbon\Carbon::now()]);
        }

        sleep(3);

        return response()->json([
            'success' => true
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
        //
    }
}
