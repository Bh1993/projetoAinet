<section id="main-page-news">
        <div class="container">
            <div class="news-header" style="padding-top:20px">
                <h1>Advertisements Tags</h1>
            </div>
            <br>
            <br>
            <div class="row">
            
                @foreach($adTags as $adTag)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail" style="border:0; padding:0">
                        @if($adTag->media->count() > 0)
                            <img src="{{$adTag->media->first()->photo_path}}" alt="photo">
                        @else
                            <img src="" alt="noImage">
                        @endif   
                            <div class="caption">
                                <h3>{{$adTag->name}}</h3>
                                <p></p>
                                <p><a href="{{route('farmersmarket.advertisement-profile',['id' => $adTag->id])}}" class="btn btn-primary" role="button">View Advertisement</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
        
            
            </div>
        </div>
         <a class="btn btn-primary" style="margin-left:615px" href="{{url('advertisements-all')}}">View All Advertisements</a>
    </section>