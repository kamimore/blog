@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    @forelse($posts as $post)
        <div>
            <ul>
                <li>
                    <a href="{{ route('post.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
                    <div>
                        <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" style="background-color: rgb(246, 70, 70)">
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    @empty
        <div>
            <h2>No Posts!!</h2>
        </div>
    @endforelse
@endsection
