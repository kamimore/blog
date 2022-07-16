@extends('layouts.app')

@section('title','All Posts')

@section('content')
@forelse($posts as $post)
<div>
    <ul>
        <li>
            <a href="{{ route('post.show',['post'=>$post->id]) }}">{{ $post->title }}</a>
        </li>
    </ul>
    </div>
@empty
<div><h2>No Posts!!</h2></div>
@endforelse
@endsection