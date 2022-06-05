
{{-- All Post --}}

@extends('layouts.main')

@section('container')

    <h2 class="mb-4">{{ $title }}</h2>

    @if ($posts->count())
    <div class="card mb-3">
        @if ($posts[0]->image)
                <img src="{{ asset('storage/' . $posts[0]->image) }}"
                    alt="{{ $posts[0]->category->name }}" class="img-fluid my-3">
            @else
                <img src="https://images.pexels.com/photos/1110658/pexels-photo-1110658.jpeg"
                alt="{{ $posts[0]->category->name }}" class="img-fluid my-3">
            @endif
        <div class="card-body text-center">
            <h4 class="card-title">
                <a href="/posts/{{ $posts[0]->id }}" class="text-decoration-none text-dark">
                    {{ $posts[0]->title }}
                </a>
            </h4>
                <p class="card-text">{{ $posts[0]->content  }}</p>
                <p class="card-text">
                    <small class="text-muted">
                        By <a href="/author/{{ $posts[0]->author->id }}" class="text-decoration-none">{{ ucfirst(strtolower($posts[0]->author->name)) }}
                        </a> in
                        <a href="/categories/{{ $posts[0]->category->id }}" class="text-decoration-none">{{ ucfirst(strtolower($posts[0]->category->name)) }}
                        </a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
        </div>
    </div>
    @else
        <p class="text-center fs-4">No post found</p>
    @endif

    <div class="row row-cols-3 row-cols-md-3 g-2">
        @foreach ($posts->skip(1) as $post)
        <div class="col mb-3">
          <div class="card">
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}"
                    alt="{{ $post->category->name }}" class="img-fluid my-3">
            @else
                <img src="https://images.pexels.com/photos/1110658/pexels-photo-1110658.jpeg"
                alt="{{ $post->category->name }}" class="img-fluid my-3">
            @endif
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

