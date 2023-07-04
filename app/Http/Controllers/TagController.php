<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class TagController extends Controller
{
    public function show($id){

        $tag = Tag::findOrFail($id);
        return view('post.post')
            ->with('posts', $tag->name)
            ->with('posts', $tag->posts);

    }
}
