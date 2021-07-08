<?php

namespace App\Http\Controllers\API;

use App\Models\Cetegory;
use App\Models\News;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResources;
use App\Http\Resources\NewsByCategoryResources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use Validator;

class CategoryController extends BaseController
{
    public function index(){

        if(Cache::get('category')){
            return $this->sendResponse(CategoryResources::collection(Cache::get('category')), 'Category fetched. #redis');
        }else{
            $data = Cache::remember('category', 33600, function () {
                return Cetegory::all();
            });
            return $this->sendResponse(CategoryResources::collection($data), 'Category fetched. #pgsql');
        }
    }

    public function find($id){
        $category = Cetegory::find($id);

        if (is_null($category)) {
            return $this->sendError('Category does not exist.');
        }

        $news = News::where('cetegories_id', $category->id)->get();
        $data = [$category, $news];

        return $this->sendResponse(new NewsByCategoryResources($data), 'News fetched by category.');
    }

    public function store(Request $request){

        $input = $request->all();
        
        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'url_img' => 'required'
        ]);
//required
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $category = Cetegory::create($input);
        
        return $this->sendResponse(new CategoryResources($category), 'Category created.');
    }

    public function destroy($id){

        $category = Cetegory::find($id);

        if (is_null($category)) {
            return $this->sendError('Category does found.');
        }

        $category->delete();

        return $this->sendResponse([], 'Category deleted.');

    }
}
