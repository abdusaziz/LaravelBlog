<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = post::paginate(5);
        if(Auth::user()->usertype == 'user'){
            return redirect('/');
        }elseif(Auth::user()->usertype == 'writter'){
            return view('admin.adminpost')->with('posts',$posts);
        }elseif(Auth::user()->usertype == 'admin'){
            return view('admin.post.index')->with('posts',$posts);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        $tags       =   tag::all();
        return view('admin.adminpostcreate',compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);
        $user = Auth()->user();
        
        $post = new post();

        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_name = $user->name;
        $post->user_id = $user->id;
        $post->usertype = $user->usertype;
        $post->post_status = 0;
        $post->category_id     =   $request->category;

        $image = $request->image;

        if($image){
            $image_name = time()."_".$image->getClientOriginalName().".".$image->getClientOriginalExtension();
            $request->image->move('post_images',$image_name);
            $post->image = $image_name;

        }


        $post->save();
        return view('admin.post.index')->with('message', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        $post = post::first($post);
        dd($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        $tags = tag::all();
        $categories = category::all();
        return view('admin.post.edit',compact('post','tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        if(Auth::user()->usertype == 'admin'){

            // dd($request);
        $user = Auth()->user();
        $image = $request->image;
        if($image){
            $image_name = time()."_".$image->getClientOriginalName();
            $request->image->move('post_images',$image_name);
            $post->image = $image_name;
        }
        $post->tags()->sync($request->input('tag', []));
        $post = $post->update([
            "title"     =>  $request->title,
            "description"     =>  $request->description,
            "user_name"     =>  $user->name,
            "user_id"     =>  $user->id,
            "usertype"     =>  $user->usertype,
            "post_status"     =>  1,
            "category_id"     =>  $request->category,
            "image"     =>  isset($image_name) ? $image_name : ""
        ]);


        return redirect('/admin/post')->with('message', 'Post created successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        if(Auth::user()->usertype == 'admin'){

        }
    }
}
