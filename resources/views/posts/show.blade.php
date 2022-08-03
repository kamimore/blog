@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->content }}</p>
    <p class="text-muted">Added {{ $post->created_at->diffForHumans() }}</p>
    @if (now()->diffInMinutes($post->created_at) < 5)
        <p class="badge bg-info">New!</p>
    @endif
    <hr>
    <div>
        <h4>Comments</h4>
        @forelse($post->comment as $key=>$comment)
        <p>{{ $comment->content ?? '' }}</p>
        <p class='text-muted'>{{ $comment->created_at->diffForHumans() ?? '' }}</p>
        @empty
            no comments present yet!
        @endforelse
    </div>

@endsection
