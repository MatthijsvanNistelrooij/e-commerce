@extends('layouts.app')

@section('content')


<div class="card card-default">
    <div class="card-header">Products</div>
    <div class="card-body">
        <table class="table table-hover">

            <thead>
                <th>
Image
        </th>
        <th>
 Name
        </th>
        <th>
Price        </th>
        {{-- <th>
            Descr
        </th> --}}
        <th>
Edit
        </th>
        <th>
Trash
        </th>

<tbody>
@foreach($products as $product)

        <tr>

            <td>
            <img src="{{ $product->image }}" alt="dna" width="50px" height="60px">
            </td>
            <td>
                {{ $product->name }}
            </td>
            <td style="min-width: 90px">
             $ {{ $product->price }}
            </td>
            {{-- <td>
                {{ $product->description }}
            </td> --}}
            <td>
            <a href="{{ route('products.edit', ['id' => $product->id ]) }}" class="btn btn-sm btn-info" style="color: white">
                <i class="fa fa-pencil"></i>
                      </a>
            </td>
            <td>
                <a href="{{ route('products.delete', ['id' => $product->id ]) }}}}" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i>
                      </a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </thead>


</table>
{{-- <a href="{{ route('products.create') }}" class="btn btn-success">Add product</a> --}}

</div>

@endsection
