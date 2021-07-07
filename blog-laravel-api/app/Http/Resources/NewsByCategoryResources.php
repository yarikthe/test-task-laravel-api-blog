<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsByCategoryResources extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
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
