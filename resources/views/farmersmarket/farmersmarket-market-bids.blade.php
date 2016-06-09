@extends('layouts.farmersmarket-head')
@include('layouts.main-nav')

<section id="main-page-news">
        <div class="container" >
             <div class="news-header">
                <h1>Active Bids</h1>
                <br>
                <div class="dropdown" style="width:0px">
                
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Browse By
                    <span class="caret">
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Top Rated</a></li>
                    <li><a href="#">Price - Lowest first</a></li>
                    <li><a href="#">Price - Highest first</a></li>
                    </ul>
                </div>

               
                <br>
            </div>
            <br>
            <h2>Advertisement Name</h2>
            <br>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" style="border:0; padding:0">
                        <img src="..." alt="...">
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>...</p>
                            <p>
                            <a href="#MarketProduct" class="btn btn-primary" role="button" data-toggle="modal" data-target="#MarketProduct">View Product</a></p>
                        </div>
                    </div>

                     <label for="inputDescription">Quantity:</label>

                     <label for="inputDescription">Rating:</label> 
                </div>
                <div class="col-sm-6 col-md-8">
                    <div class="form-group">
                        <label for="inputDescription"><h2>Product Discription</h2></label>
                        <br>
                        
                    </div>
                    <div class="form-group">
                        <label for="inputStartDate"><h2>Time Left</h2></label>
                        <br>
                       
                    </div>
                    <div class="form-group">
                        <label for="inputStartDate"><h2>Current Bid</h2></label>
                        <br>
                       
                    </div>
                    <div class="form-group">
                        <input type="text" style="width:100px" class="form-control" name="fullname" id="inputFullname" /> 
                        <a class="btn btn-primary"  href="">Place Bid</a>
                       
                    </div>
                </div>

            </div> 
             <br> 
        </div>
    </section>
    @include('layouts.farmersmarket-footer')
    