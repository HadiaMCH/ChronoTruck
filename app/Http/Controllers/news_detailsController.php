<?php 

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\news_detailsView;

class news_detailsController extends Controller
{
    public function index($id)
    {
        $news= news::where("id","$id")->first();

        (new news_detailsView)->news_details($news);

        return view('news_details',compact('news'));
    }
}