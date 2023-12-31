<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PageContoller extends Controller
{
    public function index(){
        $posts = Post::with('category','tags')->paginate(20);

        return response()->json($posts);
    }

    public function getProjectBySlug($slug){
        $post = Post::where('slug', $slug)->with('category','tags')->first();
        return response()->json($post);
    }
}
