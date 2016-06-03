@extends('layouts.farmersmarket-head')
@include('layouts.main-nav')

<section id="main-page-news">
        <div class="container">
            <div class="news-header">
                <h1>Log In</h1>
            </div>
           
            <form action="" method="post" class="form-group">
				
					<div class="form-group">
						<label for="InputEmail">Email address</label>
						    <input class="form-control" id="InputEmail" placeholder="Enter email" type="email">
					</div>

					<div class="form-group">
						<label for="InputPassword">Password</label>
						<input class="form-control" id="InputPassword" placeholder="Password" type="password">
					</div>      
						
					<div class="checkbox">
						<label><input type="checkbox"> Remember me</label>
					</div>
						
						<p class="text-right"><a href="#">Forgot password?</a></p>
					
					<div class="form-group pull-right">
						<a href="#" class="default">Cancel</a>
						<a href="#" class="btn btn-primary">Log-in</a>
					</div>
			</form>
		</div>
</section>

@include('layouts.farmersmarket-footer')

