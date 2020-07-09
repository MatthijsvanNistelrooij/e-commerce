@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <table class="table table-hover">

            <thead>
                <th>
            Category name
        </th>
        <th>
Edit
       </th>
        <th>
Delete
        </th>

<tbody>
@foreach($categories as $category)

        <tr>
            <td>
                {{ $category->name }}
            </td>
            <td>
            <a href="{{ route('categories.edit', ['id' => $category->id ]) }}" class="btn btn-sm btn-info" style="color: white">
                <i class="fa fa-pencil"></i>
                      </a>
            </td>
            <td>
                <a href="{{ route('categories.delete', ['id' => $category->id ]) }}}}" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i>
                      </a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </thead>

</table>
{{-- <a href="{{ route('category.create') }}" class="btn btn-success">Add category</a> --}}

</div>

@endsection


