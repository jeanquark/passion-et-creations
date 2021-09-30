<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageForm;
use App\Mail\ContactMessageConfirmation;


class ContactMessagesController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_messages = ContactMessage::orderBy('id', 'desc')->get();
        
        return response()->json($contact_messages);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        ]);

        $updatedContact = ContactMessage::find($id);

        $updatedContact->is_read = true;

        $updatedContact->save();

        return response()->json([
            'success' => true,
            'request' => $request,
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
        ContactMessage::where('id', '=', $id)->delete();

        return response()->json([
            'success' => true,
            'id' => $id
        ]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:1000'
        ]);

        $senderAddress = env('MAIL_FROM_ADDRESS');
        
        // 1) Save message in database
        $contactMessage = new ContactMessage;

        $contactMessage->name = $request->name;
        $contactMessage->email = $request->email;
        $contactMessage->object = $request->object;
        $contactMessage->message = $request->message;

        $contactMessage->save();
        
        // 2) Send message as email
        Mail::to($senderAddress)->send(new ContactMessageForm($contactMessage));
        Mail::to($contactMessage->email)->send(new ContactMessageConfirmation($contactMessage));

        return response()->json([
            'success' => true
        ], 200);
    }
}
