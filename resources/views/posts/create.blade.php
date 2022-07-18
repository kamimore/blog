@extends('layouts.app')

@section('title','Create New Blog Post')

@section('content')
<div>
    <form action="{{ route('post.store') }}" method="Post">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="content">Content</label>
            <textarea type="text" name="content" id="content"></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
@endsection