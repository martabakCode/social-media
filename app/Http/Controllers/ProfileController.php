<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class ProfileController extends Controller
{
    public function index($user){
        $user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profiles.index', compact('user','follows'));
    }

    public function edit(User $user){
        if($user->id == auth()->user()->id){
            return view('profiles.edit', compact('user'));
        }
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
        if($user->id == auth()->user()->id){
            $data = request()->validate([
                'title'=> 'required',
                'description' => 'required',
                'url' => 'url',
                'image' => 'file|mimes:jpg,jpeg,png,gif|max:2048',
             ]);


             if (request('image')){
                 $imagePath = request('image')->store('profile','public');

                 $imageArr =['image' => $imagePath];
             }

             auth()->user()->profile->update(array_merge(
                 $data,
                 $imageArr ?? []
             ));

             return redirect("/profile/{$user->id}");
        }
        $this->authorize('update', $user->profile);


    }
    public function explore(Request $request)
    {
        // If the request does not contain a keyword, display the search form
        if (!$request->has('keyword')) {
            $results = [];
            return view('profiles.search', ['results' => $results]);
        }

        // Validate search input
        $request->validate([
            'keyword' => 'required|string|max:255',
        ]);

        // Perform search query
        $keyword = $request->input('keyword');
        $results = User::where('username', 'like', "%$keyword%")->with('profile')->get();

        // Return search results
        return view('profiles.search', ['results' => $results]);
    }

}
