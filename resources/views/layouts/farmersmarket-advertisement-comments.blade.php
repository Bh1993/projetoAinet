
 <script type="text/javascript">
 function onClick(_id){
  if($('#' + _id).css("display") == 'none'){
  $('#' + _id).css("display", "inline");
  }
  else{
      $('#' + _id).css("display", "none");
  }
 }

 function onClick2(_id){
  console.log('.' + _id);
  if($('.' + _id).css("display") == 'none'){
  $('.' + _id).css("display", "inline");
  }
  else{
      $('.' + _id).css("display", "none");
  }
 }
 </script>
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
                    @if(!$comment->parent_id)
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
                              <a onclick="onClick({{$comment->id}})" class="btn btn-info btn-circle text-uppercase" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                              <a onclick="onClick2({{$comment->id}}+'_coments')" class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyOne"><span class="glyphicon glyphicon-comment"></span> 
                              {{$comment->comments()->count()}} Replies</a>
                              @if(Auth::check() && Auth::user()->admin == 1)  
                              <a class="btn btn-info btn-circle text-uppercase" href="">Block Comment</a>
                              @endif

                              <form id="{{$comment->id}}" style="display:none;" action="{{route('farmersmarket.advertisement-profile',['id' => $advertisement->id,'parent_id' => $comment->id])}}" method="post" class="form-horizontal" name="comment" id="commentForm" role="form">
                              {{ csrf_field() }} 
                                  <div class="form-group" style="margin-top: 2rem;">
                                      <label for="comment" class="col-sm-2 control-label">Reply to {{$comment->user->name}}</label>
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
                      </li>
                      <li class="media" >
                      @foreach($comment->comments as $reply)
                      <ul class="media-list {{$comment->id}}_coments" style="display:none;">
                      <li class="media" style="margin-left: 50px">
                        <a class="pull-left" href="#">
                          <img class="media-object img-circle" src="{{$comment->user->profile_photo}}" alt="profile" style="width: 100px">
                        </a>
                        <div class="media-body">
                          <div class="well well-lg">
                              <h4 class="media-heading text-uppercase reviews">{{$reply->user->name}}</h4>
                              @if($reply->parent_id)
                              <p>Reply to {{$reply->getParentComment->user->name}}</p>
                              @endif
                              <p>
                                {{$reply->created_at}}
                              </p>
                              <p class="media-comment">
                               {{$reply->comment}}
                              </p>
                              <a onclick="onClick({{$reply->id}})" class="btn btn-info btn-circle text-uppercase" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                              <a onclick="onClick2({{$reply->id}}+'_coments')" class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyOne"><span class="glyphicon glyphicon-comment"></span> 
                              {{$reply->comments()->count()}} Replies</a>
                              @if(Auth::check() && Auth::user()->admin == 1)  
                              <a class="btn btn-info btn-circle text-uppercase" href="">Block Comment</a>
                              @endif
                              {{$comment->id}}
                              {{$reply->id}}
                              <form id="{{$reply->id}}" style="display:none;" action="{{route('farmersmarket.advertisement-profile',['id' => $advertisement->id,'parent_id' => $reply->id])}}" method="post" class="form-horizontal" name="comment" id="commentForm" role="form">
                              {{ csrf_field() }} 
                                  <div class="form-group" style="margin-top: 2rem;">
                                      <label for="comment" class="col-sm-2 control-label">Reply to {{$reply->user->name}}</label>
                                      <div class="col-sm-10">
                                        <textarea class="form-control" name="comment" id="inputComment" rows="5" value="{{$comment->comment}}"></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-10">                    
                                          <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitReply" name="save"><span class="glyphicon glyphicon-send"></span> Submit Comment</button>
                                      </div>
                                  </div>            
                          </form>
                          </div>                
                        </div>
                      </li>
                      </ul>
                      </li>
                      @endforeach
                      @endif
                     @endforeach
                     @else
                     <h3>No Comments Found</h3>   
                     @endif          
                    </ul> 
                </div>
                
                <div class="tab-pane" id="add-comment">
                    <form action="{{route('farmersmarket.advertisement-profile',['id' => $advertisement->id])}}" method="post" class="form-horizontal" name="comment" id="commentForm" role="form">
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