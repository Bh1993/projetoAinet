<section id="main-page-news">
        <div class="container">
            <div class="news-header" style="padding-top:20px">
                <h1>Active Offers</h1>
            </div>
            <br>
            <br>
            <div class="row">
                @foreach($bids as $bid)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail" style="border:0; padding:0">
                        <img src="{{$bid->advertisement->media->first()->photo_path}}" alt="...">
                        <div class="caption">
                            
                            <h3>{{$bid->advertisement->name}}</h3>
                            <p></p>
                            <p><a href="" class="btn btn-primary" role="button">View Profile</a></p>
                        </div>
                    </div>
                </div>
            @endforeach 
            </div>
        </div>
         <a class="btn btn-primary" style="margin-left:615px" href="">View All Users</a>
    </section>