@extends('layouts.farmersmarket-head')
@include('layouts.main-nav')

<section id="main-page-news" style="height:100%">
        <div class="container">
            <div class="news-header" style="padding-top:20px">
                <h1>My Advertisements</h1>
            </div>
            <br>
            <br>
            <div class="row">
            @if(Auth::check())
                @if($user->advertisements->count()>0)
                    @foreach($user->advertisements as $advertisement)
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail" style="border:0; padding:0">
                                @if($advertisement->media->count() > 0)
                                    <img src="{{$advertisement->media->first()->photo_path}}" alt="photo">
                                @endif 

                                <div class="caption">
                                    <h3>{{$advertisement->name}}</h3>
                                    <p></p>
                                    <p><a href="{{route('farmersmarket.advertisement-profile',['id' => $advertisement->id])}}" class="btn btn-primary" role="button">View Advertisement</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h2>No Advertisements Found</h2>
                @endif
            @endif    
            </div>
            <a href="" class="btn btn-primary" role="button">Create Advertisement</a>
        </div>
</section>

@include('layouts.farmersmarket-footer')