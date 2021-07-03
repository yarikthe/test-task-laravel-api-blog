<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResources extends JsonResource
{
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'url_img'=>$this->img
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
