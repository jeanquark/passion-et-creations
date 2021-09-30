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
            'password' => 'min:8|confirmed'
        ]);

        $newUser = new User();
        $newUser->name = $request['name'];
        $newUser->email = $request['email'];
        $newUser->password = Hash::make($request['password']);

        $newUser->save();

        if ($request->hasfile('image')) {
            $image = $request['image'];
            $fileFullName = $image->getClientOriginalName();
            $fileName = pathinfo($fileFullName, PATHINFO_FILENAME);
            $fileExtension = pathinfo($fileFullName, PATHINFO_EXTENSION);
            $filePath = $image->getPath();
            $fileType = $image->getClientMimeType();

            if ($fileType == 'image/jpeg' || $fileType == 'image/png') {

                // 1) Store original image
                $originalImage = Intervention::make($image)->encode();
                Storage::disk('images')->put($request->path . '/' . $fileFullName, $originalImage);
            }
        }

        return response()->json([
            'success' => true,
            '$request->hasfile(image)' => $request->hasfile('image'),
            '$request[image]' => $request['image'],
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
    public function update(Request $request, User $user)
    {
        return response()->json([
            'success' => true,
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
        User::where('id', '=', $id)->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
