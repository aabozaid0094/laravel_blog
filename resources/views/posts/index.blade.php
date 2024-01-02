@extends('layouts.app')
@section('pageTitle') Posts @endsection
@section('pageContent')
<section class="posts my-5">
    <div class="container">
        <div class="text-center mb-3">
            <a href="{{route('posts.create')}}" class="btn btn-success">Create</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Created</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user ? $post->user->name : ''}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>
                        <a type="button" href="{{route('posts.show', $post->id)}}" class="btn btn-info">View</a>
                        <a type="button" href="{{route('posts.edit', $post->id)}}" class="btn btn-secondary">Edit</a>
                        <form method="POST" action="{{route('posts.destroy', $post->id)}}" class="post_delete_form" style="display:inline">
                            @csrf    
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
@section('pageScripts')
<script>
    const post_delete_forms = document.querySelectorAll('.post_delete_form');
    post_delete_forms.forEach(post_delete_form => {
        post_delete_form.addEventListener('submit', function(event){
            var delete_confirmed = confirm('Delete post?');
            if (!delete_confirmed)
                event.preventDefault();
        });
    });
</script>
@endsection