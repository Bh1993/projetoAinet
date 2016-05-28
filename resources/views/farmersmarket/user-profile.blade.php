@extends('layouts.farmersmarket-head')
@include('layouts.main-nav')

<section id="display" style="padding-top:20px">
		<div class="container" >
			<div class="display-header">
				<h1>User Profile</h1>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="image">
						<img src="image.jpg" alt="Mountain View" style="width:304px;height:228px;">
					</div>
				</div>

				<div class="col-sm-12 col-md-8">
					<div class="form-group">
    					<label for="inputFullname">Fullname</label>
    						<p> {{ $user->name }} </p>
        
					</div>
					
					<div class="form-group">
    					<label for="inputType">Type</label>
    						<p>{{$user->getType()}}</p>
					</div>

					<div class="form-group">
    					<label for="inputEmail">Email</label>
    						<p> {{ $user->email }} </p>
					</div>

					<div class="form-group">
    					<label for="inputLocation">Location</label>
    						<p> {{ $user->location }} </p>

					</div>

					<div class="form-group">
    					<label for="inputPresentation">Presentation</label>
    						<p> {{ $user->presentation }}</p>
        
						</div>

					<div class="form-group">
    					<label for="inputProfileUrl">Profile URL</label>
   						    <p> {{ $user->profile_url }} </p>
					</div>

					<div class="form-group">
    					<label for="inputStatus">Status</label>
    						<p>{{ $user->getStatus() }}</p>
					</div>

					<div class="form-group">
    					<label for="inputSellsEvals">Seller Evaluations</label>
    						<p> {{ $user->sells_evals }} </p>
					</div>

					<div class="form-group">
    					<label for="inputSellsCount">Sells Count</label>
    						<p> {{ $user->sells_count }}</p>
        
					</div>

					<div class="form-group">
    					<label for="inputSellsCount">Buys Evals</label>
    						<p> {{ $user->buys_evals }}</p>
					</div>

					<div class="form-group">
    					<label for="inputSellsCount">Buys Count</label>
    						<p> {{ $user->buys_count }}</p>
					</div>

				</div>
    		</div>
    	</div>
	</section>

@include('layouts.farmersmarket-footer')