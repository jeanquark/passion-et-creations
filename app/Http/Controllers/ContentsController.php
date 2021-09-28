<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Content;


class ContentsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:sanctum')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::orderBy('id', 'desc')->get();

        return response()->json($contents);
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
            'name' => 'required',
            'content' => 'required'
        ]);

        $content = new Content;

        $content->name = $request->name;
        $content->content = $request->content;
        $content->section = $request->section;
        $content->is_published = $request->is_published;

        $content->save();

        return response()->json([
            'success' => true
        ]);
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
        $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);

        $updatedContent = Content::find($id);

        $updatedContent->name = $request->name;
        $updatedContent->content = $request->content;
        $updatedContent->section = $request->section;
        $updatedContent->is_published = $request->is_published;

        $updatedContent->save();

        return response()->json([
            'success' => true,
            'request' => $request,
            'updatedContent' => $updatedContent,
            'id' => $id
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Content::where('id', '=', $id)->delete();

        return response()->json([
            'success' => true,
            'id' => $id
        ]);
    }
}
