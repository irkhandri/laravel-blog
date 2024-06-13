<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate ;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller implements HasMiddleware
{
    private User $user;

    public function __construct () {
        if (Auth::check())
            $this->user = Auth::user();
    }

    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            // 'auth',
            // new Middleware('auth', only: ['store']),
            new Middleware(['auth', 'verified' ], except: ['index', 'show', 'upd']),
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::orderBy('created_at', 'desc')->get();

        
        // dd($post);


        return view('posts.index', ['posts' => $posts]);
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        // Validate
        $fields =  $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'image' => ['nullable' ]//, 'file', 'max:10000', 'mimes:png,jpg,webp,jpeg']
        ]);

        // $path = null;
        // if ($request->hasFile('image')){
        //     $path = Storage::disk('public')->put('posts_image', $request->image);
        //     // dd($path);
        // } else {
        //     $path = 'posts_image/default.jpeg';
        // }

        // Create a potst
        // Post::create([ 'user_id' => Auth::id(), ...$fields ]);
       
        
        $path = $request->imageUrl === null 
            ? 'https://www.shutterstock.com/image-vector/image-icon-trendy-flat-style-600nw-643080895.jpg' 
            : $request->imageUrl ; 


        // Auth::user()->posts()->create($fields);
        $this->user->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path
        ]);

        // Redirect to profile
        return back()->with('success', 'Post was created');

        // dd('here');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {


        $context = [
            'post' => $post,

        ];
        
        return view ('posts.show', $context);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {   
        Gate::authorize('modify', $post);
        
        return view ('posts.edit', ['post' => $post ] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('modify', $post);

         // Validate
         $fields =  $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'image' => ['nullable'] //'file', 'max:10000', 'mimes:png,jpg,webp,jpeg']
        ]);

        // $path = $post->image ?? null;
        // if ($request->hasFile('image')){
        //     if ($post->image  && $post->image !== 'posts_image/default.jpeg')
        //         Storage::disk('public')->delete($post->image);
            
        //     $path = Storage::disk('public')->put('posts_image', $request->image);
        // } 
        $path = $request->imageUrl === null 
            ? 'https://www.shutterstock.com/image-vector/image-icon-trendy-flat-style-600nw-643080895.jpg' 
            : $request->imageUrl ; 
        // upd a potst
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);
        // Redirect to profile
        return redirect()->route('profile')->with('success', 'Post was updated');
        
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('modify', $post);

        // delete image 
        // if ($post->image !== 'posts_image/default.jpeg'){
        //     Storage::disk('public')->delete($post->image);
        // }

        $post->delete();        

        return back()->with('delete', 'Post was deleted!');
    }
}
