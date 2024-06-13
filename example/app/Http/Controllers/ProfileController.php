<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Termwind\render;

class ProfileController extends Controller
{

    public function profiles()
    {
        $profiles = User::orderBy('created_at', 'desc')->get();

        return view('user.index', [
            'profiles' => $profiles
        ]);
    }
   

    public function profile(Request $request)
    {

        $posts = Auth::user()->posts;

        // dd($posts);

        $content = [
            'posts' => $posts,
            'profile' => Auth::user()
        ];

        return view('user.profile', $content);
    }

    public function userPosts(User $user) 
    {
        $postsUser = $user->posts;
        $content = [
            'posts' => $postsUser,
            'profile' => $user,
        ];
        return view ('user.posts', $content);    
    }




}
