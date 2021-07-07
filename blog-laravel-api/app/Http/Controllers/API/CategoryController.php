<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResources;
use App\Http\Resources\NewsByCategoryResources;
use App\Models\Cetegory;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{
    public function index(){

        $cachedCategory = Redis::get('category');

        if(isset($cachedCategory)) {
            $data = json_decode($cachedCategory, FALSE);

            return response()->json([
                'status_code' => 201,
                'message' => 'Fetched from redis',
                'data' => $data,
            ]);
        }else {
            $data = Cetegory::paginate(10);
            Redis::set('category', $data);

            return response()->json([
                'status_code' => 201,
                'message' => 'Fetched from database',
                'data' => $data,
            ]);
        }
//        return CategoryResources::collection($category);
    }

    public function find($id){
        $category = Cetegory::find($id);
        $news = News::where('cetegories_id', $category->id)->paginate(10);
        $data = [$category, $news];
        return NewsByCategoryResources::collection($data);
    }

    public function store(Request $request){}

    public function destroy($id){}
}
