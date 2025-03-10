<!-- resources/views/tags/create.blade.php -->
@extends('adminlte::page')

@section('title', 'Create Tag')

@section('content_header')
    <h1>Create Tag</h1>
@endsection

@section('content')
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
