@extends('layouts.farmersmarket-head')
@include('layouts.main-nav')

<section id="main-page-news">
        <div class="container" >
            <h2>Offer Details</h2>
            <br>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" style="border:0; padding:0">
                        <img src="{{$advertisement->media->first()->photo_path}}" alt="...">
                        <div class="caption">
                            <h3>{{$advertisement->name}}</h3>
                         
                            <p><a href="{{route('farmersmarket.advertisement-profile',['id' => $advertisement->id])}}" class="btn btn-primary" role="button">View Advertisement</a></p>
                        </div>
                    </div>

                     <label for="inputDescription">Quantity:</label> {{$advertisement->quantity}} 
                     <br>
                     <label for="inputPrice">Price:</label> {{ $advertisement->price_cents }} 
               
                </div>
                <div class="col-sm-6 col-md-8">
                    <div class="form-group">
                        <label for="inputDescription"><h2>Product Description</h2></label>
                        <p>{{$advertisement->description}}</p>
                        
                    </div>
                    <div class="form-group">
                        <label for="inputOwnerName"><h2>Owner</h2></label>
                        <p>{{$advertisement->user->name}}</p>
                    </div>

                    <form action="{{route('create-bid',['id' => $advertisement->id])}}" method="post" class="form-group">
                     {{ csrf_field() }}

                     <div class="form-group">

                        <label for="inputTradeLocation">Trade Location</label>
                         <input
                            type="text" class="form-control"
                            name="trade_location" id="inputTradeLocation"
                            placeholder="Trade Location"/>
                    </div>

                    <div class="form-group">

                        <label for="inputTradePrefs">Trade Preferences</label>
                         <input
                            type="text" class="form-control"
                            name="trade_prefs" id="inputTradePrefs"
                            placeholder="Trade Preferences"/>
                    </div>

                    <div class="form-group">
                        <label for="inputPriceCents">Monetary Preferneces</label>
                         <input
                            type="text" class="form-control"
                            name="price_cents" id="inputPriceCents"
                            placeholder="Monetary Preferences"/>
                    </div>

                    <div class="form-group">
                         <button type="submit" class="btn btn-success" name="save">Submit Bid</button>

                         <button type="submit" class="btn btn-default" name="cancel" href="" >Cancel</button>
                    </div>
                    </form>    
                    </div>
                </div>
            </div> 
    </section>
@include('layouts.farmersmarket-footer')