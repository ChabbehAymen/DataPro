@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    <h1>Tags List</h1> <br>
    <a href="{{ route('tags.create') }}" class="btn btn-primary">Create Tag</a><br>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->title }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
