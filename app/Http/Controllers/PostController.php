<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function index(){
        $posts = Post::latest()->paginate(6);
        return view('posts', compact('posts'));
    }
    public function details($slug){
        $post = Post::where('slug', $slug)->first();
         
         return view('postdetails', compact('post','randomposts'));
    }

   }
