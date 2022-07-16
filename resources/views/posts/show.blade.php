@extends('layouts.app')

@section('title','Single Post')

@section('content')
<h3>Single Post Page</h3>

{{ $post->content }}

@endsection