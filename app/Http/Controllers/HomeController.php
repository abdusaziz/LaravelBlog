<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $posts = post::all();
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
        }
        if($usertype=='user'){
            return view('admin.adminhome',compact('posts'));
        }
        else if($usertype=='admin'){
            return view('admin.adminhome',compact('posts'));
        }
        else{
            return redirect()->back();
        }
    }

    public function homepage(){
        $posts = Post::selectRaw('posts.*, SUBSTRING(description, 1, 100) as shortdescription')->latest()->take(5)->get();
        $categories = category::all();
        $tags = tag::all();
        return view('home.homepage',compact(['posts','categories','tags']));
    }

    public function viewpost($id){
        $post = Post::find($id);
        return view('home.articalviewpage',compact('post'));
    }

    public function categorypage(){
        $categories = category::all();
        return view('home.categorypage',compact('categories'));
    }

    public function tagpage(){
        $tags = tag::all();
        return view('home.tagviewpage',compact('tags'));
    }

    public function categoryviewpage($slug){
        $category_id = category::select('id')->where('slug',"=",$slug)->get();
        return view('home.categoryviewpage',compact('categories'));
    }

    public function aboutpage(){
        return view('home.aboutpage');
    }
    public function legalpage(){
        return view('home.legalpage');
    }

}
