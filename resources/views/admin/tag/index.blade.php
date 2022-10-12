@extends('layout')

@section('content')
    <h1>Tags</h1>
    <a href="{{ route('admin.tag.create') }}" class="btn btn-primary">Add tag</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($tags as $tag)
            <tr>
                <th scope="row">{{ $tag->id }}</th>
                <th scope="row">{{ $tag->title }}</th>
                <td> {{ $tag->slug }} </td>
                <td><a href="{{ route('admin.tag.edit', $tag->id) }}">Edit</a></td>
                <td><a href="{{ route('admin.tag.destroy', $tag->id) }}">Delete</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{ $tags->previousPageUrl() }}">Previous</a></li>
            <li class="page-item"><a class="page-link" href="{{ $tags->nextPageUrl() }}">Next</a></li>
        </ul>
    </nav>
@endsection
