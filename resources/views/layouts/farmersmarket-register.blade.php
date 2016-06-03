@extends('layouts.farmersmarket-head')
@include('layouts.main-nav')

<section id="main-page-news">
        <div class="container">
            <div class="news-header">
                <h1>Create Account</h1>
            </div>

            <form action="" method="post" class="form-group">
            	<div class="image">
        			<img src="" alt="Mountain View" style="width:304px;height:228px;" >
    			</div>
    
        		<label>Select image to upload:</label>
        		<input type="file" name="fileToUpload" id="fileToUpload">
        	
        		<input type="submit" class="btn btn-success" value="Upload Image" name="submit">
   
   
				<div class="form-group">
    				<label for="inputFullname">Fullname</label>
    				<input
        				type="text" class="form-control"
        				name="name" id="inputFullname"
        				placeholder="Fullname" value="{{ $user->name }}" />
				</div>

				<div class="form-group">
    				<label for="inputEmail">Email</label>
    				<input
        				type="email" class="form-control"
        				name="email" id="inputEmail"
        				placeholder="Email address" value="{{ $user->email }}"/>
				</div>

				<div class="form-group">
    				<label for="inputLocation">Location</label>
    				<input
        				type="text" class="form-control"
        				name="location" id="inputLocation"
        				placeholder="Location" value="{{ $user->location }}"/>
				</div>

				<div class="form-group">
    				<label for="inputProfileUrl">Profile URL</label>
    				<input
       					 type="text" class="form-control"
        				 name="profile_url" id="inputProfileUrl"
        				 placeholder="Profile URL" value="{{ $user->profile_url }}"/>
				</div>

				<div class="form-group">
        			<label for="inputPassword">Password</label>
        			<input
            			type="password" class="form-control"
            			name="password" id="inputPassword"
            			value="{{$user->password}}"/>
    			</div>
    			
    			<div class="form-group">
        			<label for="inputPasswordConfirmation">Password confirmation</label>
        		<input
            		type="password" class="form-control"
            		name="password_confirmation" id="inputPasswordConfirmation"/>
    			</div>
    
    			<div class="form-group">
       				 <button type="submit" class="btn btn-primary" name="save">Create Account</button>
        			 <a class="btn btn-default" href="">Cancel</a>
    			</div>
			</form>
		</div>
</section>

@include('layouts.farmersmarket-footer')