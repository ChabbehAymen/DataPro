@extends('adminlte::page')

@section('title', 'Product Details')

@section('content_header')
    <h1>Product Details</h1>
@stop

@section('css')
    @vite(['resources/css/app.css'])
@stop

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-4  justify-content-end">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{Route('products.index')}}">products</a></li>
                    <li class="breadcrumb-item active">product</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mb-4 justify-content-end">
            <div class="col-sm-6">
                <ol class=" float-sm-right">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm p-2 text-white"><i
                        class="fas fa-edit"></i> modifier produit</a>
                </ol>
            </div>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="h4 font-bold">{{ $product->title }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="h3 font-bold">Description</h3>
                    <p class="text-secondary">{{ $product->desc }}</p>
                </div>
                <div class="col-md-6">
                    <h5 class="h3 font-bold">Price</h5>
                    <p class="text-lg font-semibold text-green-600">${{ number_format($product->price, 2) }}</p>
                </div>
            </div>

            <div class="mt-3">
                <h5 class="h3 font-bold">Category</h5>
                @if($product->category->isNotEmpty())
                    <span class="badge bg-primary">{{ $product->category->pluck('title')->join(', ') }}</span>
                @else
                    <span class="text-gray-500">No Category</span>
                @endif
            </div>

            <!-- Tags -->
            <div class="mt-3">
                <h5 class="h3 font-bold">Tags</h5>
                @if($product->tag->isNotEmpty())
                    @foreach($product->tag as $tag)
                        <span class="badge bg-secondary">{{ $tag->title }}</span>
                    @endforeach
                @else
                    <span class="text-gray-500">No Tags</span>
                @endif
            </div>

            <!-- Images -->
            <div class="mt-3">
                <h5 class="h3 font-bold">Product Images</h5>
                <div class="row">
                    @forelse($product->productImage as $image)
                        <div class="col-md-3">
                            <img src="{{ asset($image->img) }}" class="img-fluid rounded" alt="Product Image">
                        </div>
                    @empty
                        <p class="text-gray-500">No images available</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
<section>
@stop
