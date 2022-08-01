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
            @include('posts.partials.form')
            <div class="d-grid gap-2 col-2 ms-auto">
                <input type="submit" value="Submit" class="btn btn-primary btn-block mt-4">
            </div>
           
        </form>
    </div>
@endsection
