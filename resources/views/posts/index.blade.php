@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Blog Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
    </div>

    <!-- Category Filter -->
    <form method="GET" class="mb-3">
        <select name="category" class="form-select w-25" onchange="this.form.submit()">
            <option value="">All Categories</option>
            <option value="Technology" {{ request('category') == 'Technology' ? 'selected' : '' }}>Technology</option>
            <option value="Lifestyle" {{ request('category') == 'Lifestyle' ? 'selected' : '' }}>Lifestyle</option>
            <option value="Education" {{ request('category') == 'Education' ? 'selected' : '' }}>Education</option>
        </select>
    </form>

    <!-- Posts Listing -->
    @if($posts->count())
        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h3>
                        <a href="{{ route('posts.show', $post) }}" class="text-decoration-none">
                            {{ $post->title }}
                        </a>
                    </h3>
                    <p class="text-muted">{{ Str::limit($post->description, 100) }}</p>
                    <p><strong>Category:</strong> {{ $post->category }}</p>
                    <p>
                        <small>
                            Posted by: {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}
                        </small>
                    </p>
                </div>
            </div>
        @endforeach

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $posts->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    @else
        <div class="alert alert-info">No posts found for the selected category.</div>
    @endif
@endsection
