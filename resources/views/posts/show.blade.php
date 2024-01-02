@extends('layouts.app')
@section('pageTitle') Post @endsection
@section('pageContent')
<section class="post my-5">
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">{{$post->title}}</div>
            <div class="card-body">
                <h5 class="card-title">{{$post->created_at->diffForHumans()}}</h5>
                <p class="card-text">{{$post->description}}</p>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                Author
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$post->user ? $post->user->name : ''}}</h5>
                <p class="card-text">{{$post->user ? $post->user->email : ''}}</p>
            </div>
        </div>
        <div>
            <a type="button" href="{{route('posts.edit', $post->id)}}" class="btn btn-secondary">Edit</a>
        </div>
    </div>
</section>
@endsection