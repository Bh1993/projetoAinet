@extends('layouts.farmersmarket-head')
@include('layouts.main-nav')

<section id="main-page-news">
        <div class="container">
            <div class="news-header" style="padding-top:20px">
                <h1>My Offers</h1>
            </div>
            <br>
            <br>
            <div class="row">
            @if(Auth::check())
                @if($user->bids->count()>0)
                    @foreach($user->bids as $bid)
                        @if($bid->status == 1)
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail" style="border:0; padding:0">
                               
                                @if($bid->advertisement->media->count() > 0)
                                    <img src="{{$bid->advertisement->media->first()->photo_path}}" alt="photo">
                                @endif 

                                <div class="caption">
                                    <h3>{{$bid->advertisement->name}}</h3>
                                    <p></p>
                                    <p><a href="{{route('farmersmarket.offer-details',['id' => $bid->id])}}" class="btn btn-primary" role="button">View Offer</a></p>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @else
                    <h2>No Offers Found</h2>
                @endif
            @endif    
            </div>
        </div>

        <div class="container">
            <div class="news-header" style="padding-top:20px">
                <h1>My Purchases</h1>
            </div>
            <br>
            <br>
            <div class="row">
            @if(Auth::check())
                @if($user->purchases->count()>0)
                    @foreach($user->purchases as $purchase)
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail" style="border:0; padding:0">
                               
                                @if($purchase->advertisement->media->count() > 0)
                                    <img src="{{$purchase->advertisement->media->first()->photo_path}}" alt="photo">
                                @endif 

                                <div class="caption">
                                    <h3>{{$purchase->advertisement->name}}</h3>
                                    <p></p>
                                    <p><a href="{{route('farmersmarket.offer-details',['id' => $purchase->id])}}" class="btn btn-primary" role="button">View Offer</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h2>No Offers Found</h2>
                @endif
            @endif    
            </div>
        </div>
</section>

@include('layouts.farmersmarket-footer')