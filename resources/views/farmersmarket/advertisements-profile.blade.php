@extends('layouts.farmersmarket-head')
@include('layouts.main-nav')

<section id="main-page-news">
		<div class="container" >
			<div class="news-header">
				<h1>Advertisement Details </h1>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="image">
						<img src="{{$advertisement->media->first()->photo_path}}" alt="Mountain View" style="width:304px;height:228px;" >
					</div>
					<h3>Owner Profile</h3>
					<p><a href="{{route('farmersmarket.user-profile',['id' => $advertisement->user->id])}}">{{$advertisement->user->name}}</a></p>
				</div>

				<div class="col-sm-12 col-md-8">
					<div class="form-group">
    					<label for="inputName">Name</label>
    					<p> {{ $advertisement->name }} </p>
					</div>

					<div class="form-group">
    					<label for="inputDescription">Description</label>
    					<p> {{ $advertisement->description }} </p>
					</div>

					<div class="form-group">
    					<label for="inputStartDate">Start Date</label>
    					<p>{{ $advertisement->available_on }}</p>
					</div>

					<div class="form-group">
    					<label for="inputEndDate">End Date</label>
    					<p> {{ $advertisement->available_until }} </p>
					</div>

					<div class="form-group">
    					<label for="inputPrice">Price</label>
    					<p> {{ $advertisement->price_cents }} cents</p>
					</div>

					<div class="form-group">
   						 <label for="inputQunatity">Quantity</label>
    					 <p> {{ $advertisement->quantity }} </p>
					</div>

					<div class="form-group">
    					<label for="inputTradePrefs">Trade Preferences</label>
    					<p> {{ $advertisement->trade_prefs }} </p>
					</div>

					<div class="form-group">
    					<label for="inputMediaContent">Media Content</label>
    					<p>{{ $advertisement->media->first()->media_url }}</p>
					</div>

					<div class="form-group">
    					<label for="inputTags">Tags</label>
    					<p> {{ $advertisement->tags }} </p>
					</div>

					@if(Auth::check() && Auth::user()->admin == 1 )
					<a class="btn btn-primary" href="">Block Advertisement</a>
					
					@endif

					@include('layouts.farmersmarket-advertisement-comments')
					</div>
    			</div>
    		</div>
	</section>

@include('layouts.farmersmarket-footer')