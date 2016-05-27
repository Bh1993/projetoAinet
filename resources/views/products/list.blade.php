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
            <th>Name</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
     @foreach ($products as $product)
        <tr>
            <td> {{ $product->name }} </td>
            <td> {{ $product->description }} </td>
            <td> {{ $product->startDate }} </td>
            <td> {{ $product->endDate }} </td>
            <td> {{ $product->price }} </td>
            <td> {{ $product->getSatus() }} </td>
            
            
        <td>
                <a class="btn btn-xs btn-primary" href="{{route('products.edit', ['id' => $product->id])}}">Edit</a>
                <form action="{{route('products.delete', ['id' => $product->id])}}" method="post" class="inline">
                {{ csrf_field() }}
                    <div class="form-group">
                        <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                    </div>

                </form>
            </td>
        </tr>
    @endforeach
    </table>
    @include('layouts.pagination-products',['paginator'=>$products]);

@else
    <h2>No advertisements found</h2>
@endif
@endsection