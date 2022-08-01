<div class="form-group mb-4">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control"
        value="{{ old('title', optional($post ?? null)->title) }}">
    @error('title')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="content">Content</label>
    <textarea type="text" name="content" id="content" class="form-control"> {{ old('content', optional($post ?? null)->content) }}</textarea>
    @error('content')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
