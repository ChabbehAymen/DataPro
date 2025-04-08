@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Products</h1>
@stop

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liste des products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item active">products</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row mb-2 justify-content-end">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ Route('products.create') }}" class="btn btn-primary btn-sm p-2 text-white"><i
                            class="fas fa-plus"></i> Ajouter product</a>
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
                    <h3 class="card-title">Table des products</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Post date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->category->first()->title }}</td>
                                <td>{{ $product->user->full_name ?? 'admin' }}</td>
                                <td>{{ $product->created_at?$product->created_at->format('Y-m-d') : now() }}</td>
                                <td>
                                    <a href="{{Route('products.show',$product)}}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="{{Route('products.edit',$product)}}" class="btn btn-info btn-sm"><i
                                            class="fas fa-edit"></i> </a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
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
