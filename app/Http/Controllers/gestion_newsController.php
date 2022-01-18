<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\gestion_newsView;

class gestion_newsController extends Controller
{
    public function index()
    {        
        $news=news::all();

        (new gestion_newsView)->gestion_news($news);

        return view('gestion_news',compact('news'));
    }

    public function add_news(Request $request)
    {   
        $img= Storage::disk('public')->putFile('news', $request->file('image'));
        $image= Storage::url($img);
        $news=news::create([
            'titre'=>$request->titre,
            'description'=>$request->description,
            'paragraph'=>$request->paragraph,
            'img'=>$image,
        ]); 
        
        return redirect()->route('gestion_news');        
    }
}
