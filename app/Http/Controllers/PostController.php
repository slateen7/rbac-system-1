<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    class PostController extends Controller
    {
        public function __construct()
    {
        $this->middleware(['auth', 'role:Admin'])->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        $this->middleware(['auth', 'role:Editor'])->only(['index', 'create', 'store', 'edit', 'update']);
        $this->middleware(['auth', 'role:Viewer'])->only(['index', 'show']);
    }

        public function index()
        {
            $posts = Post::all();
            return view('posts.index', compact('posts'));
        }

        public function create()
        {
            return view('posts.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);

            Post::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'user_id' => Auth::id(),
            ]);

            return redirect()->route('editor.posts.index'); // Adjust based on role
        }

        public function edit(Post $post)
        {
            return view('posts.edit', compact('post'));
        }

        public function update(Request $request, Post $post)
        {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);

            $post->update($request->only(['title', 'content']));

            return redirect()->route('editor.posts.index'); // Adjust based on role
        }

        public function destroy(Post $post)
        {
            $post->delete();
            return redirect()->route('editor.posts.index'); // Adjust based on role
        }

    }


    // public function __construct()
    // {
    //     $this->middleware(['auth', 'role:Admin'])->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    //     $this->middleware(['auth', 'role:Editor'])->only(['index', 'create', 'store', 'edit', 'update']);
    //     $this->middleware(['auth', 'role:Viewer'])->only(['index', 'show']);
    // }


    // public function index()
    // {
    //     $posts = Post::all();
    //     return view('posts.index', compact('posts'));
    // }

    // public function create()
    // {
    //     return view('posts.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //     ]);

    //     Post::create([
    //         'title' => $request->input('title'),
    //         'content' => $request->input('content'),
    //         'user_id' => auth()->id(),
    //     ]);

    //     return redirect()->route('posts.index');
    // }


    // public function edit(Post $post)
    // {
    //     return view('posts.edit', compact('post'));
    // }


    // public function update(Request $request, Post $post)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //     ]);

    //     $post->update($request->only(['title', 'content']));

    //     return redirect()->route('posts.index');
    // }



    // public function destroy(Post $post)
    // {
    //     $post->delete();
    //     return redirect()->route('posts.index');
    // }

