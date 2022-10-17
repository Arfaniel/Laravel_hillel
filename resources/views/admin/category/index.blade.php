@extends('layout')

@section('content')
    <h1>Categories</h1>
    @can('create', \App\Models\Category::class)
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add category</a>
    @endcan
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
                @can('create', \App\Models\Category::class)
                    <td><a href="{{ route('admin.category.edit', $category->id) }}">Edit</a></td>
                <td><a href="{{ route('admin.category.destroy', $category->id) }}">Delete</a></td>
                @endcan
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
