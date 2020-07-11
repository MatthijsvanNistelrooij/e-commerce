@extends('layouts.app')

@section('content')

@include('admin.includes.errors')


<div class="card">

    <div class="card-header">Edit product : {{ $product->name }} </div>

    <div class="card-body">
    <form action="{{ route('products.update', ['id' => $product->id ]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name}}">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                {{-- <label for="category">Select Category</label>
                <select name="category_id" id="category" class="form-control">

                    @foreach($categories as $category)
                <option value="{{ $category->id}}">{{ $category->name }}</option>
                    @endforeach

                </select> --}}
            </div>



            <div class="form-group">
                <label for="description">Price</label>
                    <input type="text" name="price" id="price" class="form-control" value="{{ $product->price}}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
            <textarea name="description" id="description" cols="1" rows="1" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Product</button>

                </div>


            </div>
        </form>
    </div>




@endsection
