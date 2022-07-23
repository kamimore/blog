<div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title',
    optional($post ?? Null)->title) }}">
    <div>
        @error('title') {{ $message}} @enderror
    </div>
</div>
<div>
    <label for="content">Content</label>
    <textarea type="text" name="content" id="content">{{ old('content',
    optional($post ?? Null)->content) }}</textarea>
    <div>
        @error('content') {{ $message}} @enderror
    </div>
</div>