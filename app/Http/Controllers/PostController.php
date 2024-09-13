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
        return view('admin.adminpost')->with('posts',$posts);
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
        $post->post_status = "Active";
        $post->category_id     =   $request->category;

        $image = $request->image;

        if($image){
            $image_name = time()."_".$image->getClientOriginalName().".".$image->getClientOriginalExtension();
            $request->image->move('post_images',$image_name);
            $post->image = $image_name;

        }


        $post->save();
        return redirect()->back()->with('message', 'Post created successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}
