@extends('layouts.app')

@section('title', 'Create New Blog Post')

@section('content')
    <div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('post.update', ['post' => $post->id]) }}" method="Post">
            @csrf
            @method('PUT')

            @include('posts.partials.form')

            <button type="submit">Update</button>
        </form>
    </div>

@endsection
