<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = tag::paginate(10); // Paginate the query to fetch 10 categories per page
        return view('admin.tag.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:tags,title|max:255',
            ]);
            $user = Auth::user();
            $tag = tag::create([
                    'title'     =>  $request->title,
                    'metatitle' =>  $request->metatitle,
                    'slug'      =>  Str::slug($request->slug),
                    'content'   =>  $request->content,
                    'user_id'   =>  $user->id
            ]);
            return redirect('admin/tag');
    }

    /**
     * Display the specified resource.
     */
    public function show(tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tag $tag)
    {
        return view('admin.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tag $tag)
    {
        $request->validate([
            'title' => 'required|unique:tags,title|max:255',
            ]);
        $tag->update([
                'title'     =>  $request->title,
                'metatitle' =>  $request->metatitle,
                'slug'      =>  $request->slug,
                'content'   =>  $request->content
            ]);          
            return redirect('admin/tag');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tag $tag)
    {
        $tag->delete();
        return redirect()->back();
    }
}
