@extends('layout')

@section('content')
    <h1>Posts</h1>
    <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Add post</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <th scope="row">{{ $post->title }}</th>
                <td> {{ $post->body }} </td>
                <td> {{ $post->user->name }} </td>
                <td> {{ $post->category->title }} </td>
                <td> {{ $post->tags->pluck('title')->join(', ') }} </td>
                <td><a href="{{ route('admin.post.edit', $post->id) }}">Edit</a> </td>
                <td><a href="{{ route('admin.post.destroy', $post->id) }}">Delete</a> </td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{ $posts->previousPageUrl() }}">Previous</a></li>
            <li class="page-item"><a class="page-link" href="{{ $posts->nextPageUrl() }}">Next</a></li>
        </ul>
    </nav>

@endsection
