<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    protected $limit = 3;
    
    public function index() 
    {
        //\DB::enableQueryLog();
        $posts = Post::with('author')->latestFirst()->simplePaginate($this->limit);
        return view('blog.index', compact('posts'));
        //view('blog.index', compact('posts'))->render();
        //dd(\DB::getQueryLog());
    }
}