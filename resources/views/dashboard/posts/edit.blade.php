@extends('dashboard.layouts.main')

@section('container')
    <h2 class="my-3">Edit Post</h2>
    <form action="/dashboard/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="text" value="{{ $post->title }}" name="title">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category) 
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Post image</label>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-preview img-fluid my-3">
            @endif
            <input class="form-control" type="file" name="image" id="image">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Body</label>
            <input id="content" type="hidden" name="content" value="{{ $post->content }}">
            <trix-editor input="content"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection