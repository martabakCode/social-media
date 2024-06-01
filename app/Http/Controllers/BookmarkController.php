<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class BookmarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
            $posts = Post::whereHas('bookmarkers', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->where('user_id', '!=', auth()->user()->id)->with('user')
            ->latest()->paginate(5);
            $follows = User::where('id','!=',auth()->user()->id)->with('profile.followers')->latest()->paginate(5);
            return view('posts.index', compact('posts','follows'));
    }

    public function store(Post $post){
        auth()->user()->bookmarking()->toggle($post);
        return redirect('/');
    }
}
