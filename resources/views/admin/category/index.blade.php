@extends('layout')

@section('content')
    <h1>Categories</h1>
    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add category</a>
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
        @forelse ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <th scope="row">{{ $category->title }}</th>
                <td> {{ $category->slug }} </td>
                <td><a href="{{ route('admin.category.edit', $category->id) }}">Edit</a> </td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{ $categories->previousPageUrl() }}">Previous</a></li>
            <li class="page-item"><a class="page-link" href="{{ $categories->nextPageUrl() }}">Next</a></li>
        </ul>
    </nav>
@endsection
