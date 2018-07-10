<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts= Post::orderBy('created_at', 'disc')->get();
        return view('posts.index', compact('posts'));
    }
    public function show($id){
        $post= Post::find($id);
        return view('posts.show', compact('post'));
    }
    public function create(){
        return view('posts.create');
    }
    public function store(){
        $this->validate(request(),[
            'title'=> 'required|max:10',
            'body'=> 'required'
            ]);
        Post::create(request(['title', 'body']));
        return redirect('/');
    }
}
