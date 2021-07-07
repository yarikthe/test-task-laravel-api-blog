<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResources;
use App\Http\Resources\NewsResources;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = News::paginate(10);
        return NewsResources::collection($news);
    }

    public function store(Request $request){

    }
}
