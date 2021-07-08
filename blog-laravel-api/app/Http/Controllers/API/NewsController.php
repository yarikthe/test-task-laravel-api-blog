<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResources;
use App\Http\Resources\NewsByCategoryResources;
use App\Http\Resources\NewsResources;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use Validator;

class NewsController extends BaseController
{
    public function index(){

        if(Cache::get('news')){
            return $this->sendResponse(CategoryResources::collection(Cache::get('news')), 'Category fetched. #redis');
        }else{
            $data = Cache::remember('news', 33600, function () {
                return News::all();
            });
            return $this->sendResponse(CategoryResources::collection($data), 'Category fetched. #pgsql');
        }
    }

    public function store(Request $request){

        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'string',
            'description' => 'required',
            'text' => 'required',
            'url_img' => 'required',
            'date' => 'required',
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
