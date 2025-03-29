@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Edit Product</h1>
@stop
@section('css')
@vite(['resources/css/app.css','resources/js/admin.js'])
@stop
@section('content')

<div class="card card-primary">
    <div class="container-fluid">
        <div class="row mb-2 pt-4 justify-content-end">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{-- <li class="breadcrumb-item"><a href="{{Route('dashboard')}}">Accueil</a></li> --}}
                    <li class="breadcrumb-item active"><a href="{{Route('products.index')}}">Products</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card-header">
        <h3 class="card-title">Edit Product</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('products.update', $product->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <!-- Titre Field -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter the Title" value="{{$product->title}}">
            </div>
            <!-- description Field -->
            <div class="form-group">
                <label for="desc">Content</label>
                <textarea name="desc" class="form-control" id="description" rows="3"
                    placeholder="Entrez la description">{{ $product->desc }}</textarea>
            </div>

            <!-- price Field -->
            <div class="form-group">
                <label for="price">Price</label>
                <div class="flex">
                    <input type="number" min="1" name="price" class="form-control" id="price" placeholder="Price" value="{{$product->price}}">
                    {{-- <p>DT</p> --}}
                <!-- TODO add a price unit-->
                </div>
            </div>

            <!-- Categories Select -->
            @if(!empty($categories))
                <div class="form-group">
                    <label for="category">Catégorie</label>
                    <select name="category" class="form-control" id="category">
                        <option value="">Select Category</option>

                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" @selected($product->category->contains($category))>{{$category->title}}</option>
                        @endforeach

                    </select>
                </div>
            @endif

            <!-- Tags Field-->
            <div class="mt-5">
                <label for="tags" class="form-label text-lg font-semibold">Select Tags</label>
                <select id="tags" name="tags[]" class="form-control w-full p-2 border border-gray-300 rounded-md mt-2"
                    multiple>
                    <option value="">Select Tags</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @selected($product->tag->contains($tag)) >{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Container to display badges -->
            <div id="selected-tags" class="mt-3 flex flex-wrap gap-2"></div>
            @foreach ($errors->all() as $error)
            <div class="text-red-500 mt-2">{{ $error }}</div>
            @endforeach
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

@stop
