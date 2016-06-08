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
                        <img src="{{Auth::user()->photo_path}}" alt="Mountain View" style="width:304px;height:228px;" >
                    </div>
    
                    <label>Select image to upload:</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
            
                    <input type="submit" class="btn btn-success" value="Upload Image" name="submit">
                    </div>
                
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label for="inputFullname">Fullname</label>
                        <input
                            type="text" class="form-control"
                            name="name" id="inputFullname"
                            placeholder="Fullname" value="{{ Auth::user()->name }}" />
                        </div>
                    
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input
                            type="email" class="form-control"
                            name="email" id="inputEmail"
                            placeholder="Email address" value="{{ Auth::user()->email }}"/>
                    </div>
        
                    <div class="form-group">
                        <label for="inputLocation">Location</label>
                        <input
                            type="text" class="form-control"
                            name="location" id="inputLocation"
                            placeholder="Location" value="{{ Auth::user()->location }}"/>
                        </div>

                    <div class="form-group">
                        <label for="inputPresentation">Presentation</label>
                            <input
                            type="text" class="form-control"
                            name="presentation" id="inputPresentation"
                            placeholder="Presentation" value="{{ Auth::user()->presentation }}"/>
                        </div>

                    <div class="form-group">
                        <label for="inputLocation">Location</label>
                        <input
                            type="text" class="form-control"
                            name="location" id="inputLocation"
                            placeholder="Location" value="{{ Auth::user()->location }}"/>
                    </div>

                    <div class="form-group">
                        <label for="inputProfileUrl">Profile URL</label>
                        <input
                            type="text" class="form-control"
                            name="profile_url" id="inputProfileUrl"
                            placeholder="Profile URL" value="{{ Auth::user()->profile_url }}"/>
                    </div>
                    
                   <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                        <button type="cancel" class="btn btn-primary" name="save">Cancel</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

@include('layouts.farmersmarket-footer')

                     