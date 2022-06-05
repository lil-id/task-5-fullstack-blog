
{{-- Specific Categories --}}

@extends('layouts.main')

@section('container')

    <h2 class="mb-4">{{ $title }}</h1>

    <h6 class="mb-4"><a href="/categories" class="text-decoration-none">All Categories</a></h6>

    <div class="row row-cols-3 row-cols-md-3 g-2">
        @foreach ($posts as $post)
        <div class="col mb-3">
          <div class="card">
            <img src="https://images.pexels.com/photos/1110658/pexels-photo-1110658.jpeg" height="400" class="card-img-top" alt="{{ $post->category->name }}">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="/posts/{{ $post->id }}" class="text-decoration-none">
                        {{ $post->title }}
                    </a>
                </h5>
                <p>
                    <small>
                        By <a href="/author/{{ $post->author->id }}" class="text-decoration-none">{{ ucfirst(strtolower($post->author->name)) }}
                        </a> in
                        <a href="/categories/{{ $post->category->id }}" class="text-decoration-none">{{ ucfirst(strtolower($post->category->name)) }}
                        </a>
                    </small>
                </p>
              <p class="card-text">{{ $post->content }}</p>
              <p class="card-text"><small class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small></p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
@endsection

