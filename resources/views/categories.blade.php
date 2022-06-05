@extends('layouts.main')


{{-- All Post Categories --}}

@section('container')

    <div class="container">
        <div class="row">
            <h2 class="mb-4">{{ $title }}</h1>
            @foreach ($categories as $category)
            <div class="col-md-4">
                <a href="/categories/{{ $category->id }}">
                    <div class="card text-white">
                        <img src="https://images.pexels.com/photos/1110658/pexels-photo-1110658.jpeg"
                        alt="{{ $category->name }}" class="card-img">
                        <div class="card-img-overlay d-flex align-items-center">
                        <h5 class="card-title text-center flex-fill fs-3">{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <a href="/blog" class="text-decoration-none mt-4">Back to posts</a>
        </div>
    </div>
@endsection

