<?php

namespace App\Http\Controllers;

// use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Response;
use File;
// use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Facades\Image as Intervention;
use App\Models\PortfolioImage;

class MediasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMedias()
    {
        $files = array();
        $allowedFileTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-excel'];

        $rootDirectories = Storage::disk('medias')->directories();
        $rootFiles = Storage::disk('medias')->files();
        
        
        $allFiles = Storage::disk('medias')->allFiles();
        $allDirectories = Storage::disk('medias')->allDirectories();

        foreach ($allFiles as $file) {
            $array = array();
            $fileType = Storage::disk('medias')->mimeType($file);

            // if (in_array($fileType, $allowedFileTypes)) {
                array_push($array, $file);
                array_push($array, $fileType);
                array_push($array, Storage::disk('medias')->size($file));
                array_push($array, Storage::disk('medias')->lastModified($file));
                array_push($files, $array);
            // }
        }

        $files_with_size = array();
        foreach ($allFiles as $key => $file) {
            $files_with_size[$key]['path'] = $file;
            $files_with_size[$key]['size'] = Storage::disk('medias')->size($file);
            $files_with_size[$key]['last_updated'] = Storage::disk('medias')->lastModified($file);
            list($width, $height, $type, $attr) = getimagesize(Storage::disk('medias')->path($file));
            $files_with_size[$key]['width'] = $width;
            $files_with_size[$key]['height'] = $height;
        }

        return response()->json([
            'success' => true,
            'rootDirectories' => $rootDirectories,
            'rootFiles' => $rootFiles,
            'files' => $files,
            'allFiles' => $allFiles,
            'allDirectories' => $allDirectories,
            'array' => $array,
            'files_with_size' => $files_with_size
        ], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $files_with_size = array();
    //     $files = Storage::disk('portfolio')->allFiles();
    //     foreach ($files as $key => $file) {
    //         $files_with_size[$key]['name'] = $file;
    //         $files_with_size[$key]['size'] = Storage::disk('portfolio')->size($file);
    //         list($width, $height, $type, $attr) = getimagesize('images/portfolio/' . $file);
    //         $files_with_size[$key]['width'] = $width;
    //         $files_with_size[$key]['height'] = $height;
    //     }

    //     return response()->json([
    //         'images' => $files_with_size
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadMedias(Request $request)
    {
        // return response()->json([
        //     'success' => true,
        //     'request' => $request,
        //     'request->medias' => $request->medias,
        //     'request->files' => $request->files,
        //     // 'File::exists($request->files)' => File::exists($request->files),
        //     'request->hasfile(files)' => $request->hasfile('files')
        // ], 200);
        
        $request->validate([
            'files' => 'required|max:1024',
            'files.*' => 'mimes:doc,pdf,docx,jpg,jpeg,png'
        ]);

        if ($request->hasfile('files')) {
            foreach($request->file('files') as $file)
            {
                // $name = time().'.'.$file->extension();
                // $file->move(public_path().'/medias/', $name);  
                // $data[] = $name;
                $fileFullName = $file->getClientOriginalName();
                $fileName = pathinfo($fileFullName, PATHINFO_FILENAME);
                $fileExtension = pathinfo($fileFullName, PATHINFO_EXTENSION);
                $filePath = $file->getPath();

                $fileType = $file->getClientMimeType();
                if( $fileType == 'image/jpeg' || $fileType == 'image/png') {

                    // 1) Store original image
                    $originalFile = Intervention::make($file)->encode();
                    Storage::disk('medias')->put($request->path . '/' . $fileFullName, $originalFile);

                    // 2) Store thumbnail
                    $thumbnailName = $fileName . '_thumbnail' . '.' . $fileExtension;
                    $thumbnailImage = Intervention::make($file)->fit(512)->encode();
                    Storage::disk('thumbnails')->put($request->path . '/' .$thumbnailName, $thumbnailImage);

                    // 3) Store blurred thumbnail
                    // $thumbnailBlurryName = $fileName . '_thumbnail_blurred' . '.' . $fileExtension;
                    // $thumbnailImageBlurry = Intervention::make($file)->fit(512)->blur(25)->encode();
                    // Storage::disk('thumbnails')->put($request->path . '/' .$thumbnailBlurryName, $thumbnailImageBlurry);
                }
            }
        }

        // return response()->json([
        //     'success' => true,
        //     'file' => $file,
        //     'fileFullName' => $fileFullName,
        //     'fileName' => $fileName,
        //     'fileExtension' => $fileExtension,
        //     'fileType' => $fileType,
        //     'filePath' => $filePath,
        //     'request->path' => $request->path,
        //     // 'originalFile' => $originalFile
        // ], 200);

        // if (File::exists($request->image)) { // Upload single image

        //     $request->validate([
        //         'image' => 'required|image|max:1024'
        //     ]);

        //     // 1) Store original image
        //     $image = $request->image->getClientOriginalName();
        //     $imageName = pathinfo($image, PATHINFO_FILENAME);
        //     $imageExtension = pathinfo($image, PATHINFO_EXTENSION);
        //     $originalImage = Intervention::make($request->image)->encode();
        //     Storage::disk('portfolio')->put($image, $originalImage);

        //     // 2) Store thumbnail
        //     $thumbnailName = $imageName . '_thumbnail' . '.' . $imageExtension;
        //     $small = Intervention::make($request->image)->fit(512)->encode();
        //     Storage::disk('portfolio')->put($thumbnailName, $small);

        //     // 3) Store blurry image
        //     // $blurryName = $imageName . '_blurred' . '.' . $imageExtension;
        //     // $blurry = Image::make($request->image)->blur(15)->encode();
        //     // Storage::disk('portfolio')->put($blurryName, $blurry);

        //     // 4) Store blurry thumbnail
        //     $thumbnailBlurryName = $imageName . '_thumbnail_blurred' . '.' . $imageExtension;
        //     $smallBlurry = Intervention::make($request->image)->fit(512)->blur(25)->encode();
        //     Storage::disk('portfolio')->put($thumbnailBlurryName, $smallBlurry);

        //     return response()->json([
        //         'success' => true,
        //         'request' => $request,
        //         'request->image' => $request->image,
        //         '$imageName' => $imageName,
        //     ], 200);
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function deleteImage(Request $request)
    // {
    //     return response()->json([
    //         'status' => 'success',
    //         '$request->path' => $request->path
    //     ]);
    // }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'function' => 'store'
        ]);
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

        $portfolioImages = PortfolioImage::where('path', '=', $path)->get();
        foreach ($portfolioImages as $image) {
            PortfolioImage::where('id', '=', $image->id)->delete();
        }
        $deletedImage = Storage::disk('medias')->delete($path);
        $deletedThumbnail = Storage::disk('thumbnails')->delete($path);

        if ($deletedImage) {
            return response()->json([
                'success'   => true,
                'message'   => 'Deleted image successfully'
            ], 200);
        }
        return response()->json([
            'success'   => false,
            'message'   => 'Delete image error',
            'request->all()' => $request->all(),
            'path' => $path,
            'portfolioImages' => $portfolioImages
        ], 500);
        
    }
}
