@extends('layouts.app')
@section('pageTitle') Edit Post @endsection
@section('pageContent')
<section class="post my-5">
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">Edit Post</div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{route('posts.update', $post->id)}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <div class="form-floating mb-3">
                        <input class="form-control" placeholder="Write title here" name="title" id="title" value="{{$post->title}}" required>
                        <label for="title" class="form-label">Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Write description here" name="description" id="description" required>{{$post->description}}</textarea>
                        <label for="description">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Authors" name="user_id" id="user_id" required>
                            @foreach($users as $user)
                                <option value="{{$user->id}}" @selected($user->id==$post->user_id)>{{$user->name}}</option>
                            @endforeach
                        </select>
                        <label for="user_id">Author</label>
                    </div>
                    <button type="submit" class="btn btn-secondary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection