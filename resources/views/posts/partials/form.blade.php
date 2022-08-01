<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control"
        value="{{ old('title', optional($post ?? null)->title) }}">
    <div>
        @error('title')
            {{ $message }}
        @enderror
    </div>
</div>
<div class="form-group">
    <label for="content">Content</label>
    <textarea type="text" name="content" id="content" class="form-control"> {{ old('content', optional($post ?? null)->content) }}</textarea>
    <div>
        @error('content')
            {{ $message }}
        @enderror
    </div>
</div>
