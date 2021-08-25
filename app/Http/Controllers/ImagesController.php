<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Response;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $images = Storage::disk('images')->get('Webstamps.pdf');

        // $directories = Storage::disk('images')->allDirectories();
        // $images = Storage::disk('files')->allFiles();
        // $images = Storage::disk('portfolio')->exists('400x400.jpg');
        $files_with_size = array();
        $files = Storage::disk('portfolio')->allFiles();
        foreach ($files as $key => $file) {
            $files_with_size[$key]['name'] = $file;
            $files_with_size[$key]['size'] = Storage::disk('portfolio')->size($file);
            // $files_with_size[$key]['size2'] = Storage::disk('portfolio')->getimagesize($file);
            list($width, $height, $type, $attr) = getimagesize('images/portfolio/' . $file);
            $files_with_size[$key]['width'] = $width;
            $files_with_size[$key]['height'] = $height;
        }
        // dd($files_with_size);

        return response()->json([
            // 'directories' => $directories,
            // 'images' => $images,
            'images' => $files_with_size
        ]);
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
     * @param  \App\Models\File  $image
     * @return \Illuminate\Http\Response
     */
    public function download($imagePath)
    {
        return Storage::disk('images')->download(urldecode($imagePath));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $image
     * @return \Illuminate\Http\Response
     */
    // public function getSize($imagePath)
    public function getSize(Request $request)
    {
        $imagePath = $request->imagePath;
        return Storage::disk('images')->size(urldecode($imagePath));
        // return Storage::disk('images')->size(urldecode('/images/1920x1080.jpg'));

        // return response()->json([
        //     'request->imagePath' => $request->imagePath
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $image
     * @return \Illuminate\Http\Response
     */
    public function getLastModified(Request $request)
    {
        $imagePath = $request->imagePath;
        return Storage::disk('images')->lastModified(urldecode($imagePath));
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
    public function destroy(Request $request)
    {
        $path = $request->path;
        $deleted = Storage::disk('images')->delete($path);

        if ($deleted) {
            return response()->json([
                'success'   => true,
                'message'   => 'Deleted image successfully'
            ], 200);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Delete image error'
            ], 500);
        }
    }
}
