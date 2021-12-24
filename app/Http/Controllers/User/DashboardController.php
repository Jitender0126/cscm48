<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $categories=Category::all();
        $posts=Post::all();
        return view('user.index', compact('categories','posts'));
    }

    public function showposts(){

        return view('user.index');
    }
}
