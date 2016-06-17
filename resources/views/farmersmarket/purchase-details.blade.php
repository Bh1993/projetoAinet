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
                            <h3>{{$purchase->advertisement->name}}</h3>
                         
                            <p><a href="{{route('farmersmarket.advertisement-profile',['id' => $purchase->advertisement_id])}}" class="btn btn-primary" role="button">View Advertisement</a></p>
                        </div>
                    </div>

                     <label for="inputDescription">Quantity:</label> {{$purchase->advertisement->quantity}} 
                     <br>
                     <label for="inputPrice">Price:</label> {{ $purchase->advertisement->price_cents }} 
               
                </div>
                <div class="col-sm-6 col-md-8">
                    <div class="form-group">
                        <label for="inputDescription"><h2>Product Description</h2></label>
                        <p>{{$purchase->advertisement->description}}</p>
                        
                    </div>
                    <div class="form-group">
                        <label for="inputOwnerName"><h2>Owner</h2></label>
                        <p>{{$purchase->advertisement->user->name}}</p>
                    </div>

                     <div class="form-group">

                        <label for="inputTradeLocation">Trade Location</label>
                        <p>{{$purchase->trade_location}}
                    </div>

                    <div class="form-group">

                        <label for="inputTradePrefs">Trade Preferences</label>
                        <p>{{$purchase->trade_prefs}} 
                    </div>

                    <div class="form-group">
                        <label for="inputPriceCents">Monetary Preferneces</label>
                        <p>{{$purchase->price_cents}}
                    </div>
                    
                 
                    </div>
                </div>
            </div> 
    </section>
@include('layouts.farmersmarket-footer')