<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cetegory extends Model
{
    use HasFactory;

    protected $table = "cetegories";

    protected $fillable = [
        'name',
        'description',
        'url_img'
    ];

    public function news()
    {
      return $this->hasMany('App\Models\News');
    }
}
