@extends('layouts.app')
@section('pageTitle') Create Post @endsection
@section('pageContent')
<section class="post my-5">
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">Create Post</div>
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
                <form method="POST" action="{{route('posts.store')}}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" placeholder="Write title here" name="title" id="title" value="{{old('title')}}" required>
                        <label for="title" class="form-label">Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Write description here" name="description" id="description" required>{{old('description')}}</textarea>
                        <label for="description">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Authors" name="user_id" id="user_id" required>
                            <option selected disabled hidden>Select Author</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <label for="user_id">Author</label>
                    </div>
                    <button type="submit" class="btn btn-success">Create</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection