<h5><a href="{{ route('post.show',['post'=>$post->id]) }}" class="text-decoration-none">{{ $post->title ?? '' }}</a></h5>
<div class="d-flex flex-row m-2 mb-3">
    <a href="{{ route('post.edit',['post'=>$post->id]) }}" class="btn btn-success btn-sm me-2">Edit</a>
    <form class="" action="{{ route('post.destroy',['post'=>$post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="DELETE" class="btn btn-danger btn-sm">
    </form>
</div>