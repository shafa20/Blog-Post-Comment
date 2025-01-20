@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
    <p><strong>Category:</strong> {{ $post->category }}</p>
    <p><small>Posted by: {{ $post->user->name }}</small></p>

    <hr>

    <h4>Comments</h4>
    @foreach($post->comments as $comment)
        <div class="mb-3">
            <p>{{ $comment->comment_text }}  @can('update', $comment)
                <a class="btn btn-sm btn-primary" href="{{ route('comments.edit', $comment->id) }}">Edit</a>
                @endcan
            </p>
            <p>
                <small>
                    <strong>Commented by: {{ $comment->user->name }}</strong>
                    at {{ $comment->created_at->format('M d, Y h:i A') }}
                </small>
            </p>



            @if(auth()->id() === $post->user_id)
                <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            @endif

        </div>
    @endforeach

    <hr>

    <h4>Add a Comment</h4>
    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="comment_text" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>
@endsection
