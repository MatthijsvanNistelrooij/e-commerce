@extends('layouts.app')

@section('content')


<div class="card card-default">
    <div class="card-header">Trashed Products</div>
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
Price
        </th>
        {{-- <th>
            Descr
        </th> --}}
        <th>
      Restore
        </th>
        <th>
Delete
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
                <a href="{{ route('products.restore', ['id' => $product->id ]) }}}}" class="btn btn-sm btn-success">
                    <i class="fa fa-undo"></i>
                      </a>
            </td>
            <td>
                <a href="{{ route('products.kill', ['id' => $product->id ]) }}" class="btn btn-sm btn-danger" style="color: white">
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
