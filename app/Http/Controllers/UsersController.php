<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Intervention;

class UsersController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:admin')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response()->json($users);
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
            'name' => 'string|max:64',
            'email' => 'email|unique:users',
            'image' => 'mimes:jpg,jpeg,png',
            'password' => 'min:8|confirmed',
            'picture.*' => 'mimes:jpg,jpeg,png'
        ]);

        $newUser = new User();
        $newUser->name = $request['name'];
        $newUser->email = $request['email'];
        $newUser->password = Hash::make($request['password']);

        // $newUser->save();

        if ($request->hasfile('picture')) {
            $image = $request['picture'];
            $fileFullName = $image->getClientOriginalName();
            $fileName = pathinfo($fileFullName, PATHINFO_FILENAME);
            $fileExtension = pathinfo($fileFullName, PATHINFO_EXTENSION);
            $filePath = $image->getPath();
            $fileType = $image->getClientMimeType();

            if ($fileType == 'image/jpeg' || $fileType == 'image/png') {

                // 1) Store original image
                $originalImage = Intervention::make($image)->encode();
                $uploadedFile = Storage::disk('images')->put($request->path . '/' . $fileFullName, $originalImage);

                // 2) Save in DB
                if ($uploadedFile) {
                    $newUser->picture = $fileFullName;
                }
            }
        }
        // if ($request->hasfile('picture')) {
        //     foreach($request->file('picture') as $file) {
        //         $fileFullName = $file->getClientOriginalName();
        //         $fileName = pathinfo($fileFullName, PATHINFO_FILENAME);
        //         $fileExtension = pathinfo($fileFullName, PATHINFO_EXTENSION);
        //         $filePath = $file->getPath();

        //         $fileType = $file->getClientMimeType();
        //         if( $fileType == 'image/jpeg' || $fileType == 'image/png') {

        //             // 1) Store original image
        //             $originalFile = Intervention::make($file)->encode();
        //             $uploadedFile = Storage::disk('images')->put($request->path . '/' . $fileFullName, $originalFile);
      
        //             // 2) Save in DB
        //             if ($uploadedFile) {
        //                 $newUser->picture = $fileFullName;
        //             }
        //         }
        //     }
        // }

        $newUser->save();

        return response()->json([
            'success' => true,
            '$request->hasfile(picture)' => $request->hasfile('picture'),
            '$request[picture]' => $request['picture'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
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
            'name' => 'string|max:64',
            'new_picture.*' => 'mimes:jpg,jpeg,png'
        ]);

        $updatedUser = User::find($id);
        $updatedUser->name = $request->name;

        if ($request->hasfile('new_picture')) {
            foreach($request->file('new_picture') as $file) {
                $fileFullName = $file->getClientOriginalName();
                $fileName = pathinfo($fileFullName, PATHINFO_FILENAME);
                $fileExtension = pathinfo($fileFullName, PATHINFO_EXTENSION);
                $filePath = $file->getPath();

                $fileType = $file->getClientMimeType();
                if( $fileType == 'image/jpeg' || $fileType == 'image/png') {

                    // 1) Store original image
                    $originalFile = Intervention::make($file)->encode();
                    $uploadedFile = Storage::disk('images')->put($request->path . '/' . $fileFullName, $originalFile);
      
                    // 2) Delete old image & save in DB
                    if ($uploadedFile) {
                        Storage::disk('images')->delete($updatedUser->picture);
                        $updatedUser->picture = $fileFullName;
                    }
                }
            }
        }
        $updatedUser->save();


        return response()->json([
            'success' => true,
            // '$id' => $id,
            // '$request' => $request,
            // '$request->hasfile(new_picture)' => $request->hasfile('new_picture'),
            // '$request[new_picture]' => $request['new_picture']
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
        $updatedUser = User::find($id);
        if ($updatedUser->picture) {
            Storage::disk('images')->delete($updatedUser->picture);
        }

        User::where('id', '=', $id)->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
