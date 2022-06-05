
{{-- Single Post --}}

@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-4">{{ $post->title }}</h2>
                <p>
                    By <a href="/author/{{ $post->author->id }}" class="text-decoration-none"> {{ ucfirst(strtolower($post->author->name)) }}
                    </a> in
                    <a href="/categories/{{ $post->category->id }}" class="text-decoration-none"> {{ ucfirst(strtolower($post->category->name)) }}
                    </a>
                </p>

                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid my-3">
                @else
                    <img src="https://images.pexels.com/photos/1110658/pexels-photo-1110658.jpeg"
                    alt="{{ $post->category->name }}" class="img-fluid my-3">
                @endif

                <article class="my-2 fs-5">
                    {!!$post->content!!}
                </article>
                <a href="/blog" class="text-decoration-none">Back to posts</a>
            </div>
        </div>
    </div>
@endsection