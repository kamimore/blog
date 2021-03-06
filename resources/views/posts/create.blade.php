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
        <form action="{{ route('post.store') }}" method="Post">
            @csrf
            @include('posts.partials.form');
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
