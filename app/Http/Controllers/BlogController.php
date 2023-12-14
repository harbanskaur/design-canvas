<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::guard('signup')->id();
        // $userid = $user->id;

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
            $add->user_id = $user;

            $add->save();
        }

        return redirect()->back()->with('success','Your Blog is inserted  Successfully...');;
        
    }

    public function submitcomment(Request $request)
    {
        $request->validate([
            'blogid' => 'required|exists:product,id',
            'comment' => 'required|string|max:255',
        ]);
        $user = Auth::guard('signup')->id();
      
        if($request->isMethod('post'))
        {
            $comment = new Comment;

            $comment->blogid = $request->get('blogid');
            $comment->comment = $request->get('comment');
            $comment->user_id = $user;
            $comment->user_name = $username;
            $comment->save();
        }
        
        return redirect()->back()->with('success','Comment submitted successfully');
    }
    // public function viewComments($blogId)
    // {
    //     $blog = Blog::find($blogId);

    //     if (!$blog) {
    //         abort(404); // Handle non-existent blog
    //     }
    //     $comments = Comment::where('blog_id', $blogId)->get();
    //     return view('view-comments', compact('blog', 'comments'));
    // }
    
}
