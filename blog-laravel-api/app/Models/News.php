<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    protected $fillable = [
        'name',
        'description',
        'text',
        'url_img',
        'date',
        'author',
        'cetegories_id',
        'status',
    ];
}
