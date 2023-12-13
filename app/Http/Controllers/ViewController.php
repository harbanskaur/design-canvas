<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class ViewController extends Controller
{
    public function index()
    {
        $data = Blog::all(); //all data from blogs table
        $category = Category::all(); // all data from category table 
        // $categories = Category::where('id',$id)->get();
        // $show = Blog::where('cid',$id)->get();'categories','show'
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
    public function category()
    {
        $category = Category::all();
        $data = Blog::all();
        return view('category',compact('category','data'));

    }
    public function blog()
    {
        $category = Category::all();
        $data = Blog::all();
        return view('blogs',compact('category','data'));

    }
}
