@extends('layouts.main')

@section('container')
    <h1>About Author</h1>
    <img src="img/{{ $foto }}" alt="{{ $name }}" width="200" class="img-thumbnail rounded">
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
@endsection