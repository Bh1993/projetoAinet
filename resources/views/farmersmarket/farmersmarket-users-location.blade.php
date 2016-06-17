<section id="main-page-news">
        <div class="container">
            <div class="news-header" style="padding-top:20px">
                <h1>Users Location</h1>
            </div>
            <br>
            <br>
            <div class="row">
                @foreach($location as $l)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail" style="border:0; padding:0">
                        <img src="{{$l->profile_photo}}" alt="...">
                        <div class="caption">
                            
                            <h3>{{$l->name}}</h3>
                            <p></p>
                            <p><a href="{{route('farmersmarket.user-profile',['id' => $l->id])}}" class="btn btn-primary" role="button">View Profile</a></p>
                        </div>
                    </div>
                </div>
            @endforeach 
            </div>
        </div>
         <a class="btn btn-primary" style="margin-left:615px" href="{{url('users-all')}}">View All Users</a>
    </section>