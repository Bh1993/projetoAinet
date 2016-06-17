@extends('layouts.farmersmarket-head')
@include('layouts.main-nav')

<section id="main-page-news">
        <div class="container" >
            <h1>Offer Details</h1>
            <br>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" style="border:0; padding:0">
                        <img src="{{$bid->advertisement->media->first()->photo_path}}" alt="...">
                        <div class="caption">
                            <h3>{{$bid->advertisement->name}}</h3>
                         
                            <p><a href="{{route('farmersmarket.advertisement-profile',['id' => $bid->advertisement_id])}}" class="btn btn-primary" role="button">View Advertisement</a></p>
                        </div>
                    </div>

                     <label for="inputDescription">Quantity:</label> {{$bid->advertisement->quantity}} 
                     <br>
                     <label for="inputPrice">Price:</label> {{ $bid->advertisement->price_cents }} 
               
                </div>
                <div class="col-sm-6 col-md-8">
                 @if($bid->buyer_id != Auth::user()->id)
                 <h2>Offer Made By: <a href="{{route('farmersmarket.user-profile',['id' => $bid->buyer_id])}}">{{$bid->getName()}}</a></h2>
                 @endif
            
                    <div class="form-group">
                        <label for="inputDescription"><h2>Product Description</h2></label>
                        <p>{{$bid->advertisement->description}}</p>
                        
                    </div>
                    <div class="form-group">
                        <label for="inputOwnerName"><h2>Owner</h2></label>
                        <p>{{$bid->advertisement->user->name}}</p>
                    </div>

                     <div class="form-group">

                        <label for="inputTradeLocation">Trade Location</label>
                        <p>{{$bid->trade_location}}
                    </div>

                    <div class="form-group">

                        <label for="inputTradePrefs">Trade Preferences</label>
                        <p>{{$bid->trade_prefs}} 
                    </div>

                    <div class="form-group">
                        <label for="inputPriceCents">Monetary Preferneces</label>
                        <p>{{$bid->price_cents}}
                    </div>

                    @if($bid->buyer_id != Auth::user()->id)
                    <form action="{{route('bid.accept',['id' => $bid->id])}}" method="post" class="inline">
                        {{csrf_field()}}
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" id="accept">Accept</button>
                            </div>
                    </form>

                    <form action="{{route('bid.decline',['id' => $bid->id])}}" method="post" class="inline"> 
                        {{csrf_field()}}      
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" id="accept">Decline</button>
                            </div>
                    </form> 

                    <form action="{{route('bid.counter',['id' => $bid->id])}}" method="post" class="inline"> 
                        {{csrf_field()}}      
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" id="accept">Counter Offer</button>
                            </div>
                    </form>

                    @else
                       <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <p>{{$bid->getStatus()}}</p>
                    </div>
                    @endif

                    </div>
                </div>
            </div> 
    </section>
@include('layouts.farmersmarket-footer')