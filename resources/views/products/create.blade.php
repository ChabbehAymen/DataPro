@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Create Product</h1>
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
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="card-header">
        <h3 class="card-title">Create Product</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <div class="card-body">
            
        <div class="w-full flex justify-center">
<div class="w-full md:h-[35vh] md:w-[70%] relative grid grid-cols-1 md:grid-cols-3 border border-gray-300 bg-gray-100 rounded-lg">
    <div
        class="rounded-l-lg p-4 bg-gray-200 flex flex-col justify-center items-center border-0 border-r border-gray-300 ">
        <label class="cursor-pointer hover:opacity-80 inline-flex items-center shadow-md my-2 px-2 py-2 bg-blue-500 text-gray-50 border border-transparent
        rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none 
       focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" for="restaurantImage">
           
    Select images
            <input id="restaurantImage" class="text-sm cursor-pointer w-36 hidden" type="file">
        </label>
       <!-- <button
    class = 'inline-flex items-center shadow-md my-2 px-2 py-2 bg-gray-900 text-gray-50 border border-transparent
        rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none 
       focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
    remove image
</button> -->
    </div>
    <div 
        class="relative order-first md:order-last h-28 md:h-auto flex justify-center items-center border border-dashed border-gray-400 col-span-2 m-2 rounded-lg bg-no-repeat bg-center bg-origin-padding bg-cover">
            <span class="text-gray-400 opacity-75">
                <svg class="w-14 h-14"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.7" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
            </span>
    </div>
</div>
</div>
            <!-- Titre Field -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter the Title">
            </div>
            <!-- description Field -->
            <div class="form-group">
                <label for="desc">Content</label>
                <textarea name="desc" class="form-control" id="description" rows="3"
                    placeholder="Entrez la description"></textarea>
            </div>

            <!-- price Field -->
            <div class="form-group">
                <label for="price">Price</label>
                <div class="flex">
                    <input type="number" min="1" name="price" class="form-control" id="price" placeholder="Price">
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
                            <option value="{{$category->id}}">{{$category->title}}</option>
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
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
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
