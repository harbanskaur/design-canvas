<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function addblog(Request $request)
    {
        // dd($request->all());
        // die;
        $request->validate([
                'image'=>'required',
                'projectName'=>'required',
                'category'=>'required',
                'description'=>'required',
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $customName = time().'.'.$image->getClientOriginalExtension();
            $imagePath = $image->move('product_images', $customName, 'public');
        }
        
        if ($request->isMethod('post')) {
            $add = new Blog;
            $add->image = $imagePath;
            $add->pname = $request->get('projectName');
            $add->cid = $request->get('category');
            $add->desc = $request->get('description');
            $add->save();
        }

        return redirect()->back()->with('success','Your Blog is inserted  Successfully...');;
        
    }


    
}
