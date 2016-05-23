@extends('layouts.backend')

@section('title', 'List advertisements')

@section('content')

<div>
    <a class="btn btn-primary" href="{{route('products.create')}}">Add Advertisement</a>
    <div class="pull-right"> 
       <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Order By
                <span class="caret">
            </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">Description</a></li>
            <li><a href="#">Start Date</a></li>
            <li><a href="#">End Date</a></li>
            <li><a href="#">Price</a></li>
            <li><a href="#">Quantity</a></li>
            <li><a href="#">Media Content</a></li>
            <li><a href="#">Tags</a></li>
        </ul>
        </div>
      
    </div>
</div>

@if (count($products))
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Media Content</th>
            <th>Tags</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
     @foreach ($products as $product)
        <tr>
            <td> {{ $product->description }} </a></td>
            <td> {{ $product->startDate }} </td>
            <td> {{ $product->endDate }} </td>
            <td> {{ $product->price }} </td>
            <td> {{ $product->quantity }} </td>
            <td> {{ $product->mediaContent }} </td>
            <td> {{ $product->tags }} </td>
            
            <td>
                <a
                    href="{{route('products.edit', ['id' => $product->id])}}"
                    class="btn btn-xs btn-primary">Edit</a>

                <form action="products-delete.php" method="post" class="inline">
                    <input type="hidden"
                        name="product_id"
                        value="{{route('products.delete', ['id' => $product->id])}}">
                    <button
                        type="submit"
                        class="btn btn-xs btn-danger">Delete</button>
                </form>

            </td>
        </tr>
    @endforeach
    </table>
    @extends('layouts.pagination')

@else
    <h2>No advertisements found</h2>
@endif
@endsection