@extends('layout')

@section('title', 'Author')

@section('content')
    <h1>{{ $user->name }} => {{ $category->title }}</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Post title</th>
            <th scope="col">Post category</th>
            <th scope="col">Body</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($posts as $post)
            <tr>
                <th scope="row">{{ $post->title }}</th>
                <td>{{ $post->category->title }}</td>
                <td>{{ $post->body }}</td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
@endsection
