@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->content }}</p>
    <p>Added {{ $post->created_at->diffForHumans() }}</p>
    @if (now()->diffInMinutes($post->created_at) < 5)
        <p class="badge bg-info">New!</p>
    @endif
@endsection
