<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsByCategoryResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'category' =>[
                'id'=>$request->data[0]->id,
//                'name'=>$this->name,
//                'description'=>$this->description,
//                'url_img'=>$this->img,
            ],
            'news'=>[
                'id'=>$this->id,
//                'title'=>$this->title,
//                'description'=>$this->description,
//                'text'=>$this->text,
//                'url_img'=>$this->url_img,
//                'date'=>$this->date,
//                'author'=>$this->author,
//                'cetegories_id'=>$this->cetegories_id,
//                'status'=>$this->status
            ]

        ];
    }

    public function with($request)
    {
        return [
            'version' => 'v1.0.1',
            'author' => 'Yaroslav Lukyanchuk',
            'website' => url('https://yarik.lukyanchuk.com')
        ];
    }
}
