<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class HomeController extends Controller
{
    public function index () {
        
        return view('index', [
            'content' => Content::where('section', '=', 'accueil')->first()
        ]);
    }
}
