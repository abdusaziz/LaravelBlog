<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        $posts = post::paginate(5);

        if(Auth::id()){ $usertype = Auth()->user()->usertype; }

        if($usertype=='user'){ return redirect('/');}

        else if($usertype=='writter'){ return view('admin.adminhome',compact('posts')); }

        else if($usertype=='admin'){ return view('admin.adminhome',compact('posts')); }

        else{ return redirect()->back(); }
    }


    public function homepage(){

        $posts = Post::with(['tags','category'])
            ->selectRaw('posts.*, SUBSTRING(description, 1, 100) as shortdescription')
            ->where("post_status","=","1")
            ->latest()
            ->paginate(5);

        $categories = category::all();
        $tags = tag::all();

        return view('home.homepage',compact(['posts','categories','tags']));
    }


    public function viewpost($id){

        $post = Post::with(['category','tags'])->find($id);

        return view('home.articalviewpage',compact('post'));
    }


    public function categorypage(){

        $categories = category::all();
        $tags = tag::all();        
        $latest_post_category_id = post::select('category_id')->latest()->first()->category_id;

        $posts = Post::selectRaw('posts.*, SUBSTRING(description, 1, 100) as shortdescription')
        ->where("post_status","=","1")
        ->where("category_id","=",$latest_post_category_id)
        ->paginate(5);

        return view('home.categorypage',compact('categories','posts','tags'));
    }


    public function tagpage(){

        $tags = tag::all();
        $categories = category::all();
        $latest_post_category_id = post::select('category_id')->latest()->first()->category_id;

        $posts = Post::selectRaw('posts.*, SUBSTRING(description, 1, 100) as shortdescription')
        ->where("post_status","=","1")
        ->where("category_id","=",$latest_post_category_id)
        ->paginate(5);

        return view('home.tagviewpage',compact('categories','posts','tags'));
    }


    public function categoryviewpage($slug){

        $category = category::where('slug', '=', $slug)->first();

        if (!$category) { abort(404, 'Tag not found.'); }

        $posts = $category->posts()
            ->where("post_status", "=", "1")
            ->selectRaw('posts.*, SUBSTRING(description, 1, 100) as shortdescription')
            ->paginate(5);

        $categories = category::all();
        $tags = tag::all();

        return view('home.categoryviewpage', compact('posts', 'category','categories', 'tags'));
    }


    public function tagviewpage($slug)
    {
        $tag = Tag::where('slug', '=', $slug)->first();
        if (!$tag) { abort(404, 'Tag not found.'); }

        $posts = $tag->posts()
            ->where("post_status", "=", "1")
            ->selectRaw('posts.*, SUBSTRING(description, 1, 100) as shortdescription')
            ->paginate(5);
        
        $categories = category::all();
        $tags = tag::all();

        return view('home.tagviewpage', compact('posts', 'tag','categories', 'tags'));
    }


    public function aboutpage(){
        return view('home.aboutpage');
    }


    public function legalpage(){
        return view('home.legalpage');
    }


    public function searchpage(Request $request)
    {
        // Get the search query from the request
        $searchTerm = $request->input('query');

        // Search across posts, categories, and tags using LIKE
        $posts = Post::with(['tags', 'category'])
            ->selectRaw('posts.*, SUBSTRING(description, 1, 100) as shortdescription')
            ->where(function ($query) use ($searchTerm) {
                // Search in post title, short description, or full description
                $query->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('id', 'LIKE', "%{$searchTerm}%");
            })
            ->orWhereHas('category', function($query) use ($searchTerm) {
                // Search in the category title
                $query->where('title', 'LIKE', "%{$searchTerm}%");
            })
            ->orWhereHas('tags', function($query) use ($searchTerm) {
                // Search in the tags title
                $query->where('title', 'LIKE', "%{$searchTerm}%");
            })
            ->where("post_status", "=", "1")
            ->latest()
            ->paginate(5);

            // Load all categories and tags for display
            $categories = Category::all();
            $tags = Tag::all();

            return view('home.searchpage', compact('posts', 'categories', 'tags'))
                ->with('success', 'Search results for "' . $searchTerm . '"');
    }

}
