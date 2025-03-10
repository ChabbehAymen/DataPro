@extends('adminlte::page')

@section('title', 'Edit Tag')

@section('content_header')
    <h1>Edit Tag</h1>
@endsection

@section('content')
    <form action="{{ route('tags.update', $tag) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $tag->title }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
