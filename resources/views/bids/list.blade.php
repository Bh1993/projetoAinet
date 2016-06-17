@extends('layouts.backend')

@section('title', 'List Bids')

@section('content')

<div>
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

@if (count($bids))
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Buyer</th>
            <th>Quantity</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>

     @foreach ($bids as $bid)
        <tr>
            <td><a href="{{route('bids.display-bid', ['id' => $bid->id])}}">{{ $bid->advertisement->name }}</a></td>
            <td><a href="{{route('users.display-user', ['id' => $bid->user->id])}}"> {{ $bid->getName() }}</a></td>
            <td> {{ $bid->advertisement->quantity }} </td>
            <td> {{ $bid->advertisement->available_on }} </td>
            <td> {{ $bid->advertisement->available_until }} </td>
            <td> {{ $bid->getStatus() }} </td>   
        </td>
    </tr>
    @endforeach

</table>
@include('layouts.pagination-bids',['paginator'=>$bids])

@else
<h2>No Bids found</h2>
@endif
@endsection