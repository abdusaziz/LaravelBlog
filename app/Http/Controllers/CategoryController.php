<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $categories = Category::paginate(10); // Paginate the query to fetch 10 categories per page
        return view('admin.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|unique:categories|max:255',
        ]);
        $user = Auth::user();
        $category = category::create([
                'title'     =>  $request->title,
                'metatitle' =>  $request->metatitle,
                'slug'      =>  Str::slug($request->slug),
                'content'   =>  $request->content,
                'user_id'   =>  $user->id
        ]);
        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $category = category::where('id',"=",$id)
            ->update([
                'title'     =>  $request->title,
                'metatitle' =>  $request->metatitle,
                'slug'      =>  $request->slug,
                'content'   =>  $request->content
            ]);          
            return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
