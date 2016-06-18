@extends('layouts.farmersmarket-head')
@include('layouts.main-nav')

<section id="main-page-news">
		<div class="container" >
			<div class="news-header">
				<h1>My Profile</h1>
			</div>
			
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="image">
						<img src="{{Auth::user()->profile_photo}}" alt="{{Auth::user()->name}}" style="width:304px;height:228px;">
					</div>
					<h2>User's Advertisements</h2>
					<p></p>
					@if(Auth::user()->advertisements->count()>0)
						@foreach(Auth::user()->advertisements as $advertisement)
						<p><a href="{{route('farmersmarket.advertisement-profile',['id' => $advertisement->id])}}">{{$advertisement->name}}</a></p>
						@endforeach
					@else
					<h3>No Advertisements found</h3>	
					@endif	
				</div>

				<div class="col-sm-12 col-md-8">
					<div class="form-group">
    					<label for="inputFullname">Fullname</label>
    						<p> {{ Auth::user()->name }} </p>
					</div>
					
					<div class="form-group">
    					<label for="inputType">Type</label>
    						<p>{{Auth::user()->getType()}}</p>
					</div>

					<div class="form-group">
    					<label for="inputEmail">Email</label>
    						<p> {{ Auth::user()->email }} </p>
					</div>

					<div class="form-group">
    					<label for="inputLocation">Location</label>
    						<p> {{ Auth::user()->location}} </p>

					</div>

					<div class="form-group">
    					<label for="inputPresentation">Presentation</label>
    						<p> {{ Auth::user()->presentation }}</p>
        
						</div>

					<div class="form-group">
    					<label for="inputProfileUrl">Profile URL</label>
   						    <p> {{Auth::user()->profile_url }} </p>
					</div>

					<div class="form-group">
    					<label for="inputSellsEvals">Seller Evaluations</label>
    						<p> {{ Auth::user()->sells_evals }} </p>
					</div>

					<div class="form-group">
    					<label for="inputSellsCount">Sells Count</label>
    						<p> {{ Auth::user()->sells_count }}</p>
        
					</div>

					<div class="form-group">
    					<label for="inputSellsCount">Buys Evals</label>
    						<p> {{ Auth::user()->buys_evals }}</p>
					</div>

					<div class="form-group">
    					<label for="inputSellsCount">Buys Count</label>
    						<p> {{ Auth::user()->buys_count }}</p>
					</div>
					@if(Auth::User()->id == $user->id)
					<a class="btn btn-primary" href="{{route('farmersmarket.user-edit-profile', ['id' => Auth::user()->id])}}">Edit Profile</a>
					@endif
				</div>
    		</div>
    	</div>
	</section>

@include('layouts.farmersmarket-footer')