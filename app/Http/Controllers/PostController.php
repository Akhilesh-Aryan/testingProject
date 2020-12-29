<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class PostController extends Controller
{
    public function index(Request $request)
    {
        if($request->filled('search')){
            $search = $request->search;
            $data['data']= Post::where('title','LIKE',"%$search%")->orWhere('author','LIKE',"%$search%")->get();
        }
        else{
        $data['data'] = Post::all();
    }
    return view('work.home', $data);
    }

    public function create()
    {
        if(Auth::guest()){
            return redirect()->route('login');
        }
        return view('work.insert');
    }

    
    public function store(Request $request)
    {
        if(Auth::guest()){
            return redirect()->route('login');
        }
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'body'=>'required',
            'image'=>'required|mimes:png,jpg',
        ]);
        $filename = time(). "." .$request->image->extension();
        $request->image->move(public_path('images'),$filename);
        Post::create([
            'title'=>$request->title,
            'author'=>$request->author,
            'body'=>$request->body,
            'image'=>$filename,
            'user_id'=> Auth::id(),
        ]);
        $request ->session()->flash('msg',"<div class = 'alert alert-success'>Data Inserted Successfully!</div>");
       
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('work.view',['value'=>$post]);
    }

    public function edit(Post $post)
    {
        $data['data'] = $post;
        return view('work.edit',$data);
    }

    public function update(Request $request, Post $post)
    {
        if(Auth::guest()){
            return redirect()->route('login');
        }
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'body'=>'required',
            'image'=>'required|mimes:png,jpg',
        ]);
        $filename = time(). "." .$request->image->extension();
        $request->image->move(public_path('images'),$filename);
        Post::find($post->id)->update([
            'title'=>$request->title,
            'author'=>$request->author,
            'body'=>$request->body,
            'image'=>$filename,
            'user_id'=> Auth::id(),
        ]);
        $request ->session()->flash('msg',"<div class = 'alert alert-success'>Data Updated Successfully!</div>");
       
        return redirect()->route('post.index');
    }

    public function destroy(Post $post, Request $request)
    {
        $post->delete();
        $request->session()->flash('msg',"<div class='alert alert-danger'>Data deleted successfully</div>");
        return redirect()->route('post.index');
    }
}
