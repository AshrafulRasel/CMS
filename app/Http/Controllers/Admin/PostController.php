<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Notifications\AuthorPostApprove;
use App\Notifications\NewPostNotify;
use App\Post;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $this->validate($request, [
            'title' => 'required|unique:posts',
            'title' => 'required|unique:posts',
            'body' => 'required',
            'post_type' => 'required',
            'url' => 'required_if:post_type,==,2',
            'section' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);


        $image = $request->file('image');
        $slug = str_slug($request->title);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('post')){
                Storage::disk('public')->makeDirectory('post');
            }

            $postImage = Image::make($image)->resize(1600, 1066)->save();
            Storage::disk('public')->put('post/'.$imageName, $postImage);
        } else{
            $imageName = "default.png";
        }

        $post = new Post();
         if($request->url){
            $post->url = $request->url;
        }
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->image = $imageName;
        $post->body = $request->body;
        $post->section = $request->section;
        $post->post_type = $request->post_type;

        if(isset($request->status)){
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->is_approved = true;
        $post->save();

        // $post->categories()->attach($request->categories);
        // $post->tags()->attach($request->tags);

        // $subscribers = Subscriber::all();
        // foreach ($subscribers as $subscriber ){

        //     Notification::route('mail',$subscriber->email)
        //             ->notify(new NewPostNotify($post));


        // }

        Toastr::success('Post Successfully Saved', 'Success');
        return redirect()->route('admin.post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // delete old image
        if (Storage::disk('public')->exists('category/'.$post->image)){
            Storage::disk('public')->delete('category/'.$post->image);
        }
        $post->delete();

        Toastr::success('Post Successfully Deleted');
        return redirect()->back();
    }
}
