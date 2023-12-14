<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;

class ViewController extends Controller
{
    public function index()
    {
        $data = Blog::limit(10)->get(); //all data from blogs table
        $category = Category::all(); // all data from category table 
        return view('index', compact('data','category'));
    }
    public function login()
    {
        return view('login');
    }
    public function signup()
    {
        return view('signup');
    }
    public function category(Request $request,$id)
    {
        $categories = Category::all();
        $selectedCategory = Category::findOrFail($id);
        $show = Blog::where('cid', $id)->get();
        $comments = Comment::where('blogid',$request->get('blogid'));
        return view('category', compact('categories', 'selectedCategory', 'show','comments'));
    }
}
