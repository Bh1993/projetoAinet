@extends('layouts.backend')

@section('title', 'Bid Information')

@section('content')
@if (count($errors) > 0)
    @include('partials.errors')
@endif

<div class="col-sm-6 col-md-4">
    @if($bid->advertisement->media->count() > 0)
        @if($bid->advertisement->media->first()->photo_path)
        <img src="{{$bid->advertisement->media->first()->photo_path}}" alt="Mountain View" style="width:304px;height:228px;" >
        @else
        <img src="images/no-image.jpg" alt="Mountain View" style="width:304px;height:228px;" >
        @endif
    @endif
    <br>
    <br>
     <label>Offer Made By: <a href="{{route('users.display-user',['id' => $bid->buyer_id])}}">{{$bid->getName()}}</a></label>
</div>

<div class="col-sm-6 col-md-8">
 	<div class="form-group">
		<label for="inputName">Name</label>
		<p> {{ $bid->advertisement->name }} </p>
	</div>

	<div class="form-group">
       <label for="inputDescription">Product Description</label>
       <p>{{$bid->advertisement->description}}</p>
                        
    </div>
    
    <div class="form-group">
        <label for="inputOwnerName">Owner</label>
        <p>{{$bid->advertisement->user->name}}</p>
    </div>

    <div class="form-group">
		<label for="inputTradeLocation">Trade Location</label>
         <p>{{$bid->trade_location}}
    </div>

    <div class="form-group">
		<label for="inputName">Name</label>
		<p> {{ $bid->advertisement->quantity }} </p>
	</div>

    <div class="form-group">

        <label for="inputTradePrefs">Trade Preferences</label>
        <p>{{$bid->trade_prefs}} 
   </div>

    <div class="form-group">
        <label for="inputPriceCents">Monetary Preferneces</label>
        <p>{{$bid->price_cents}}
    </div>

    <div class="form-group">
       <label for="inputStatus">Status</label>
       <p>{{$bid->status}}</p>
    </div>
 @endsection
