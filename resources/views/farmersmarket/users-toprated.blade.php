@extends('layouts.farmersmarket-head')
@include('layouts.main-nav')

<section id="main-page-news">
        <div class="container">
            <div class="news-header" style="padding-top:20px">
                <h1>Top Rated Users</h1>
            </div>
            <div class="pull-right"> 
            {!!Form::open(['route' => 'users-all-orderBy'])!!}
            {!!Form::select('options', $options)!!}
            {!!Form::submit('Order')!!}
            {!!Form::close()!!}
            </div>
            <br>
            <br>
            <div class="row">
            @foreach($users as $user)
            @if($user->admin == 0)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail" style="border:0; padding:0">
                        <img src="{{$user->profile_photo}}" alt="...">
                        <div class="caption">
                            <h3>{{$user->name}}</h3>
                            <p></p>
                            <p><a href="{{route('farmersmarket.user-profile',['id' => $user->id])}}" class="btn btn-primary" role="button">Read More</a></p>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach    
            </div>
@include('layouts.pagination-users',['paginator'=>$users])    
        </div>
    
    </section>
@include('layouts.farmersmarket-footer')