<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class UserController extends Controller
{
    public function show($id){

        $user = User::findOrFail($id);
        return view('post.post')->with('posts', $user->post);
    }
}
