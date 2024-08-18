@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Posts</h1>

        @can('create', App\Models\Post::class)
            <div class="mb-4 text-center">
                <a href="{{ route('editor.posts.create') }}" class="btn btn-primary btn-sm">Create Post</a>
            </div>
        @endcan

        <div class="row justify-content-center">
            @foreach($posts as $post)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100 border-0 text-center" style="height: 300px; overflow: hidden;">
                        <div class="card-body">
                            <h4 class="card-title text-truncate">{{ $post->title }}</h4>
                            <p class="card-text" style="overflow-y: auto; max-height: 150px;">{{ Str::limit($post->content, 100) }}</p>
                        </div>
                        <div class="card-footer bg-white border-0 d-flex justify-content-center">
                            @can('update', $post)
                                <a href="{{ route('editor.posts.edit', $post->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                            @endcan

                            @can('delete', $post)
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
