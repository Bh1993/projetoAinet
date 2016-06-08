<section id="main-page-news">
        <div class="container">
            <div class="news-header" style="padding-top:20px">
                <h1>Advertisements</h1>
            </div>
            <br>
            <br>
            <div class="row">
            
                @foreach($advertisements as $advertisement)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail" style="border:0; padding:0">
                    @if($advertisement->media->count() > 0)
                        <img src="{{$advertisement->media->first()->photo_path}}" alt="photo">
                    @else
                        <img src="" alt="noImage">
                    @endif   
                        <div class="caption">
                            <h3>{{$advertisement->name}}</h3>
                            <p></p>
                            <p><a href="{{route('farmersmarket.advertisement-profile',['id' => $advertisement->id])}}" class="btn btn-primary" role="button">View Advertisement</a></p>
                        </div>
                    </div>
                </div>
            @endforeach 
            
            </div>
        </div>
         <a class="btn btn-primary" style="margin-left:615px" href="">View All Advertisements</a>
    </section>