@extends('layout')

@section('title', 'Category')

@section('content')
    <h1>{{ $tag->title }}</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Post title</th>
            <th scope="col">Body</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($posts as $post)
            <tr>
                <th scope="row">{{ $post->title }}</th>
                <td>{{ $post->slug }}</td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
@endsection
