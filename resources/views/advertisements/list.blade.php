@extends('layouts.backend')

@section('title', 'List Advertisements')

@section('content')

<div>
    <a class="btn btn-primary" href="{{route('advertisements.create')}}">Add Advertisement</a>
    <a class="btn btn-primary" href="{{url('advertisements')}}">All Advertisements</a>
    <a class="btn btn-primary" href="{{route('advertisements.allBlocked')}}">List of All Ads Blocked</a>
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

@if (count($advertisements))
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Owner id</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

     @foreach ($advertisements as $advertisement)
        <tr>
            <td><a href="{{route('advertisements.display-advertisement', ['id' => $advertisement->id])}}">{{ $advertisement->name }}</a></td>
            <td> {{ $advertisement->owner_id }} </td>
            <td> {{ $advertisement->available_on }} </td>
            <td> {{ $advertisement->available_until }} </td>
            <td> {{ $advertisement->price_cents }} </td>
            <td> {{ $advertisement->getStatus() }} </td>
        <td>
            <a class="btn btn-xs btn-primary" href="{{route('advertisements.edit', ['id' => $advertisement->id])}}">Edit</a>
            <form action="{{route('advertisements.delete', ['id' => $advertisement->id])}}" method="post" class="inline">
                {{ csrf_field() }}
                <div class="form-group">
                    <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                </div>
            </form>
            <form action="{{route('advertisements.block', ['id' => $advertisement->id])}}" method="post" class="inline">
                {{ csrf_field() }}
                <div class="form-group">
                     @if ($advertisement->blocked == 0)
                    <button type="submit" class="btn btn-xs btn-danger" name="block" >Block Product</button>
                    @else
                    <button type="submit" class="btn btn-xs btn-success" name"block" >Unblock Product</button>
                    @endif
                </div>
      
            </form>
        </td>
    </tr>
    @endforeach

</table>
@include('layouts.pagination-advertisements',['paginator'=>$advertisements]);

@else
<h2>No advertisements found</h2>
@endif
@endsection