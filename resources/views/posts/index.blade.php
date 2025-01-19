@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Blog Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
    </div>

    <form method="GET" class="mb-3">
        <select name="category" class="form-select w-25" onchange="this.form.submit()">
            <option value="">All Categories</option>
            <option value="Technology" {{ request('category') == 'Technology' ? 'selected' : '' }}>Technology</option>
            <option value="Lifestyle" {{ request('category') == 'Lifestyle' ? 'selected' : '' }}>Lifestyle</option>
            <option value="Education" {{ request('category') == 'Education' ? 'selected' : '' }}>Education</option>
        </select>
    </form>

    @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h3><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                <p>{{ $post->description }}</p>
                <p><strong>Category:</strong> {{ $post->category }}</p>
                <p><small>Posted by: {{ $post->user->name }}</small></p>
            </div>
        </div>
    @endforeach
@endsection
