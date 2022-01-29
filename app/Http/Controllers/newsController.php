<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\newsView;

class newsController extends Controller
{
    public function index()
    {   
        $firstnews= news::where("id","<","6")->get();
        $news= news::where("id",">=","6")->get();

        return (new newsView)->news($firstnews,$news);

    }
}
