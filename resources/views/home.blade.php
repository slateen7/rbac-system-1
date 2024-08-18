@extends('layouts.app')

@section('content')
<center>
    <div class="container mt-5">
       <i> <h1 class="mb-4">Dashboard</h1></i>

        <div class="mb-3">
            @if(auth()->user()->role->name === 'Admin')
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary me-2">Create Post</a>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">View Posts</a>
            @elseif(auth()->user()->role->name === 'Editor')
                <a href="{{ route('editor.posts.create') }}" class="btn btn-primary me-2">Create Post</a>
                <a href="{{ route('editor.posts.index') }}" class="btn btn-secondary">View Posts</a>
            @else
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">View Posts</a>
            @endif
        </div>
    </div>
</center>
@endsection
