 @extends('layouts.backend')

 @section('title', 'User Information')

 @section('content')
 @if (count($errors) > 0)
 @include('partials.errors')
 @endif
 

<div class="col-sm-6 col-md-4">
 
        <img src="{{ $user->profile_photo }}" alt="Mountain View" style="width:304px;height:228px;" >
        <h2>User's Advertisements</h2>
                    <p></p>
                    @if(Auth::user()->advertisements->count()>0)
                        @foreach(Auth::user()->advertisements as $advertisement)
                        <p><a href="{{route('advertisements.display-advertisement',['id' => $advertisement->id])}}">{{$advertisement->name}}</a></p>
                        @endforeach
                    @else
                    <h3>No Advertisements found</h3>    
                    @endif  
 </div>   

<div class="col-sm-6 col-md-8">


    <div class="form-group">
        <label for="inputFullname">Fullname</label>
        <p> {{ $user->name }} </p>
        
    </div>
    <div class="form-group">
        <label for="inputType">Type</label>
        <p>{{$user->getType()}}</p>
    </div>

    <div class="form-group">
        <label for="inputEmail">Email</label>
        <p> {{ $user->email }} </p>
    </div>

    <div class="form-group">
        <label for="inputLocation">Location</label>
        <p> {{ $user->location }} </p>

    </div>

    <div class="form-group">
        <label for="inputPresentation">Presentation</label>
        <p> {{ $user->presentation }}</p>
        
    </div>

    <div class="form-group">
        <label for="inputProfileUrl">Profile URL</label>
        <p> {{ $user->profile_url }} </p>
    </div>

    <div class="form-group">
        <label for="inputStatus">Status</label>
        <p>{{ $user->getStatus() }}</p>
    </div>

    <div class="form-group">
        <label for="inputSellsEvals">Seller Evaluations</label>
        <p> {{ $user->sells_evals }} </p>
    </div>

    <div class="form-group">
        <label for="inputSellsCount">Sells Count</label>
        <p> {{ $user->sells_count }}</p>
        
    </div>

     <div class="form-group">
        <label for="inputSellsCount">Buys Count</label>
        <p> {{ $user->buys_count }}</p>
    </div>


        <div class="form-group">
            
            @if(Auth::check() && Auth::user()->admin == 1 )
            <form action="{{route('users.block', ['id' => $user->id])}}" method="post" class="inline">
                {{ csrf_field() }}
               
                @if ($user->blocked == 0)
                <button type="submit" class="btn btn-danger" name="block" >Block User</button>
                @else
                <button type="submit" class="btn btn-success" name"block" >Unblock User</button>
                @endif
            </form>
            @endif
        </div>
        <a class="btn btn-default" href="{{url('users')}}" name="cancel">Cancel</a>


    </div>
    @endsection

