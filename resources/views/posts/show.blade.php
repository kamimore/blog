@extends('layouts.app')

@section('title','Single Post')

@section('content')
<h3>Single Post Page</h3>

<div>{{ $post->title }}</div>
<div>{{ $post->content }}
</div>
@endsection