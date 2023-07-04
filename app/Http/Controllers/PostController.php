<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Requests\SavePostRequest;

class PostController extends Controller
{
    public function index(){

        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('post.post')->with('posts', $posts);
    }
    public function edit($id){
        $posts = Post::find($id);
        return view('post.post')->with('posts', $posts);
    }
    public function show($id){
        $post = Post::find($id);

        return view('post.show')->with('post', $post);
    }
    public function create(){

        $tags = Tag::all();

        return view('post.create')
            ->with('title', 'Add new post')
            ->with('tags', $tags);
    }

    public function store(SavePostRequest $request){
        
        $post = Auth::user()->post()->create($request->all());
        $post->tags()->sync( $request->get('tags') ?: [] );

        return redirect('/');

    }
}
