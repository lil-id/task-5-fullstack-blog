@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center my-4">
        <div class="col-md-8">
            <h2 class="mb-4">{{ $post->title }}</h2>

            <a href="/dashboard/posts" class="btn btn-success"><i class="bi bi-arrow-left me-2"></i>Back to my post</a>
            <a href="/dashboard/posts/{{ $post->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square me-2"></i>Edit</a>
            <form action="/dashboard/posts/{{ $post->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i>Delete</button>
            </form>

            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}"
                    alt="{{ $post->category->name }}" class="img-fluid my-3">
            @else
                <img src="https://images.pexels.com/photos/1110658/pexels-photo-1110658.jpeg"
                alt="{{ $post->category->name }}" class="img-fluid my-3">
            @endif

            <article class="my-2 fs-5">
                {!!$post->content!!}
            </article>
        </div>
    </div>
</div>
@endsection