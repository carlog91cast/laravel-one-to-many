@extends('layouts.app')

@section('title', 'content')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card mt-4" style="width: 18rem;">
            <img src="{{ $post->post_image }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <h6 lass="card-title">{{ $post->author }}</h6>
                <p class="card-text">{{ $post->post_content }}</p>
                <p class="card-text">{{ $post->post_date }}</p>

            </div>
        </div>
    </div>

@endsection
