@extends('adminlte::page')


@section('title', 'Dashboard')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List of categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mb-2 justify-content-end">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ Route('categories.create') }}" class="btn btn-primary btn-sm p-2 text-white"><i
                                class="fas fa-plus"></i> Add category</a>
                    </ol>
                </div>
            </div>
        </div>
</section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table of categories</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->created_at?$category->created_at->format('Y-m-d') : now() }}</td>
                                <td>
                                    <a href="{{ route('categories.edit',$category)}}" class="btn btn-info btn-sm"><i
                                            class="fas fa-edit"></i> </a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Plus de lignes ici -->
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        {{ $data->links('pagination::bootstrap-5') }}
    </section>
@stop

@section('css')
    @vite(['resources/css/app.css'])
@stop



