@extends('layout')

{{--@section('title', 'Posts')--}}


@section('content')
    <h1>Posts</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Body</th>
            <th scope="col">Updated at</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <th scope="row">{{ $post->title }}</th>
                <td><a href="author/{{ $post->user->id }}"> {{ $post->user->name }} </a></td>
                <td><a href="category/{{ $post->category->id }}">{{ $post->category->title }}</a></td>
                <td>{{ $post->tags->pluck('title')->join(', ') }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ date_format($post->updated_at, "Y-m-d") }}</td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
@endsection
