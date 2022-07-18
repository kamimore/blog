@extends('layouts.app')

@section('title','Create New Blog Post')

@section('content')
<div>
    @if($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('post.store') }}" method="Post">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            <div>
                @error('title') {{ $message}} @enderror
            </div>
        </div>
        <div>
            <label for="content">Content</label>
            <textarea type="text" name="content" id="content"></textarea>
            <div>
                @error('content') {{ $message}} @enderror
            </div>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
@endsection