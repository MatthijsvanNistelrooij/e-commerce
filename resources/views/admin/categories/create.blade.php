@extends('layouts.app')

@section('content')

@include('admin.includes.errors')


<div class="card">

    <div class="card-header">Add a new category</div>

    <div class="card-body">
    <form action="{{ route('category.store') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Category</label>
                <input type="text" name="name" class="form-control">
            </div>


            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Submit category</button>

                </div>


            </div>
        </form>
    </div>




@endsection
