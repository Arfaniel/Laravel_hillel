@extends('layout')

@section('content')
    <form action="{{ route('admin.post.update') }}" method="post">
        @csrf
        <input type="hidden" value="{{ $post->id }}" name="id">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            @if($errors->has('title'))
                @foreach($errors->get('title') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" aria-label="With textarea" id="body" name="body">{{ $post->body }}</textarea>
            @if($errors->has('body'))
                @foreach($errors->get('body') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @if($category->id == $post->category_id) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>
            @if($errors->has('category_id'))
                @foreach($errors->get('category_id') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" id="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}"
                            @if($user->id == $post->user_id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </select>
            @if($errors->has('user_id'))
                @foreach($errors->get('user_id') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select multiple aria-label="multiple select example" name="tags[]" id="tags">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" @if(in_array($tag->id, $post->tags->pluck('id')->toArray())) selected
                        @endif>{{ $tag->title }}</option>
                @endforeach
            </select>
            @if($errors->has('tags'))
                @foreach($errors->get('tags') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection()
