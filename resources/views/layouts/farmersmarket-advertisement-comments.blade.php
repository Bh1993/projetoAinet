
 <div class="row" style="padding-top:20px">
        <div class="col-sm-12 col-md-12">
            <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comments</h4></a></li>
                <li class=""><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Add comment</h4></a></li>
            </ul>            
            <div class="tab-content">
                <div class="tab-pane active" id="comments-logout">                
                    <ul class="media-list">
                    @if($advertisement->comments()->count()>0)
                    @foreach($advertisement->comments as $comment)
                      <li class="media">
                        <a class="pull-left" href="#">
                          <img class="media-object img-circle" src="{{$comment->user->profile_photo}}" alt="profile" style="width: 100px">
                        </a>
                        <div class="media-body">
                          <div class="well well-lg">
                              <h4 class="media-heading text-uppercase reviews">{{$comment->user->name}}</h4>
                              <p>
                                {{$comment->created_at}}
                              </p>
                              <p class="media-comment">
                               {{$comment->comment}}
                              </p>
                              <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                              
                              <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyOne"><span class="glyphicon glyphicon-comment"></span> 
                              {{$comment->comments()->count()}} comments</a>

                              @if(Auth::user()->admin == 1)  
                              <a class="btn btn-info btn-circle text-uppercase" href="">Block Comment</a>
                              @endif
                          </div> 
                                        
                        </div>

                      </li>
                   
                     @endforeach
                     @else
                     <h3>No Comments Found</h3>   
                     @endif          
                    </ul> 
                </div>

                <div class="tab-pane" id="add-comment">
                    <form action="{{route('farmersmarket.advertisement-profile',['id' => $advertisement->id])}}" method="post" class="form-horizontal" id="commentForm" role="form">
                    {{ csrf_field() }} 
                        <div class="form-group">
                            <label for="comment" class="col-sm-2 control-label">Comment</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="comment" id="inputComment" rows="5" value="{{$comment->comment}}"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">                    
                                <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment" name="save"><span class="glyphicon glyphicon-send"></span> Submit Comment</button>
                            </div>
                        </div>            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 