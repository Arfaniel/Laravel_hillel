@extends('layout')

@section('content')
    <h1>Admin panel</h1>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('admin.category') }}">Catogories</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('admin.tag') }}">Tags</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('admin.post') }}">Posts</a>
        </li>
    </ul>
    <br>
    <a href="{{ route('auth.logout') }}" class="btn btn-primary">Logout</a>
@endsection
