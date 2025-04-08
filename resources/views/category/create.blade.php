@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Create Category</h1>
@stop
@section('css')
@vite(['resources/css/app.css'])
@stop

@section('content')

<div class="card card-primary">
    <div class="container-fluid">
        <div class="row mb-2 pt-4 justify-content-end">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{-- <li class="breadcrumb-item"><a href="{{Route('dashboard')}}">Accueil</a></li> --}}
                    <li class="breadcrumb-item active"><a href="{{Route('categories.index')}}">Categories</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card-header">
        <h3 class="card-title">Create Category</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <div class="card-body">
            <!-- Titre Field -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter the Title">
            </div>




        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

                <!-- Container to display badges -->
                <div id="" class="mt-3 flex flex-wrap gap-2"></div> 
                @foreach ($errors->all() as $error)
                <div class="text-red-500 mt-2">{{ $error }}</div>
                @endforeach
            </div>
</div>

@endsection


