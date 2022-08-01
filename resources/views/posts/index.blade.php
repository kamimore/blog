@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    @forelse($posts as $jey => $post)
        @include('posts.partials.post')
    @empty
       No Posts found!
    @endforelse
    {{-- @each('posts.partials.post',$posts,'post','No Posts Found') --}}
@endsection
