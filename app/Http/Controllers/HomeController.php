<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class HomeController extends Controller
{
    public function index () {
        
        $content = Content::where('section', '=', 'accueil')->where('is_published', '=', true)->first();
        $image = Content::where('section', '=', 'accueil-image')->where('is_published', '=', true)->first();

        return view('index', [
            'content' => $content,
            'image' => $image
        ]);
    }
}
