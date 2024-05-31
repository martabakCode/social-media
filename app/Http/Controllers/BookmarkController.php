<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class BookmarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post){
        auth()->user()->bookmarking()->toggle($post);
        return redirect('/');
    }
}
