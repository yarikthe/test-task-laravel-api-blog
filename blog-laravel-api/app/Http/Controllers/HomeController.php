<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Cetegory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        return view('admin.home');
    }

    public function news()
    {
        $news = News::orderBy('id','DESC')->paginate(10);
        $category = Cetegory::all();
        $count = News::count();
        return view('admin.news', compact('news', 'category', 'count'));
    }

    public function category()
    {
        $category = Cetegory::orderBy('id','DESC')->paginate(5);
        $count = Cetegory::count();
        return view('admin.category', compact('category', 'count'));
    }
}
