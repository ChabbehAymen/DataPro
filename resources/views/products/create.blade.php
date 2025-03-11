@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Create Product</h1>
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
                <select id="tags" name="tags" class="form-control w-full p-2 border border-gray-300 rounded-md mt-2"
                    multiple onchange="updateBadges()">
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
<script>
    // Function to update badges when tags are selected or deselected
    function updateBadges() {
        const selectElement = document.getElementById('tags');
        const selectedTags = Array.from(selectElement.selectedOptions); // Get selected options
        const badgesContainer = document.getElementById('selected-tags');

        // Clear existing badges
        // badgesContainer.innerHTML = '';

        // Loop through selected tags and create badges
        selectedTags.forEach(option => {
            const badge = document.createElement('span');
            badge.classList.add('badge', 'bg-blue-500', 'text-white', 'px-3', 'py-1', 'rounded-full', 'flex', 'items-center', 'space-x-2');
            badge.innerHTML = option.text +
                `<button type="button" class="text-white hover:text-gray-300" onclick="removeTag(event, ${option.value})">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>`;
            badgesContainer.appendChild(badge);
        });
    }

    // Function to remove a tag badge and deselect the tag
    function removeTag(event, tagId) {
        const selectElement = document.getElementById('tags');
        const option = selectElement.querySelector(`option[value="${tagId}"]`);
        if (option) {
            option.selected = false;  // Deselect the tag in the select dropdown
            updateBadges();  // Re-render badges
        }
    }
</script>
@stop