<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResources;
use App\Http\Resources\NewsByCategoryResources;
use App\Http\Resources\NewsResources;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Validator;

class NewsController extends BaseController
{
    public function index(){

        $news = News::paginate(10);

        if(Cache::get('news')){
            return $this->sendResponse(NewsResources::collection(Cache::get('news')), 'News fetched. #redis');
        }else{
            $data = Cache::set('news', 33600, function () {
                return News::paginate(10);
            });
            return $this->sendResponse(NewsResources::collection($data), 'News fetched. #pgsql');
        }
    }

    public function store(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required',
            'text' => 'required',
            'url_img' => 'required',
            'date' => 'required|date',
            'author' => 'required',
            'cetegories_id' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $news = News::create($input);
        
        return $this->sendResponse(new NewsResources($news), 'News created.');
    }
}
