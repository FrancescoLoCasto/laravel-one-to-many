<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $posts = Post::paginate(10);
        return view('guest.posts.index', compact('posts'));
    }
}
