<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $feature = Post::where('section', 1)->where('status', 1)->orderBy('id', 'desc')->get()->first();
        $feature2 = Post::where('section', 2)->where('status', 1)->orderBy('id', 'desc')->get()->first();

        $section1 = Post::where('section', 1)->where('status', 1)->orderBy('id', 'desc')->get();
        $section2 = Post::where('section', 2)->orderBy('id', 'desc')->get();

         return view('welcome2', compact('section1', 'section2', 'feature', 'feature2'));
    }
}
