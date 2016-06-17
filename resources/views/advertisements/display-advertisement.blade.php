@extends('layouts.backend')

@section('title', 'Advertisement Information')

@section('content')
@if (count($errors) > 0)
@include('partials.errors')
@endif

<div class="col-sm-6 col-md-4">
    @if($advertisement->media->count() > 0)
    @if($advertisement->media->first()->photo_path)
    <img src="{{$advertisement->media->first()->photo_path}}" alt="Mountain View" style="width:304px;height:228px;" >
    @else
    <img src="images/no-image.jpg" alt="Mountain View" style="width:304px;height:228px;" >
    @endif
    @endif
    <h3>Owner Profile</h3>
    <p><a href="{{route('users.display-user',['id' => $advertisement->user->id])}}">{{$advertisement->user->name}}</a></p>
</div>

<div class="col-sm-6 col-md-8">

    <div class="form-group">
        <label for="inputName">Name</label>
        <p> {{ $advertisement->name }} </p>
    </div>

    <div class="form-group">
        <label for="inputDescription">Description</label>
        <p> {{ $advertisement->description }} </p>
    </div>

    <div class="form-group">
        <label for="inputStartDate">Start Date</label>
        <p>{{ $advertisement->available_on }}</p>
    </div>

    <div class="form-group">
        <label for="inputEndDate">End Date</label>
        <p> {{ $advertisement->available_until }} </p>
    </div>

    <div class="form-group">
        <label for="inputPrice">Price</label>
        <p> {{ $advertisement->price_cents }} cents</p>
    </div>

    <div class="form-group">
        <label for="inputPrice">Trade Preference</label>
        <p> {{ $advertisement->trade_prefs }} </p>
    </div>

    <div class="form-group">
        <label for="inputQunatity">Quantity</label>
        <p> {{ $advertisement->quantity }} </p>
    </div>

    <div class="form-group">
        <label for="inputMediaContent">Media Content</label>
        <p>{{ $advertisement->media()->first()->media_url }}</p>
    </div>

    <div class="form-group">
        <label for="inputTags">Tags</label>
        @foreach($advertisement->tags as $tag)
        @if($tag->blocked == 0)
        <p> {{ $tag->name }} </p>
        @endif
        @endforeach
    </div>

    <div class="form-group">
        <label for="inputTags">Status</label>
        <p> {{ $advertisement->getStatus() }}</p>
    </div>


    <div>
        <form action="{{route('advertisements.block', ['id' => $advertisement->id])}}" method="post" class="inline">
            {{ csrf_field() }}
            <div class="form-group">
                @if ($advertisement->blocked == 0)
                <button type="submit" class="btn btn-danger" name="block" >Block Product</button>
                @else
                <button type="submit" class="btn btn-success" name"block" >Unblock Product</button>
                @endif
            </div>
        </form>
    </div>
    <div>
        <a class="btn btn-default" href="{{url('advertisements')}}" name="cancel">Cancel</a>
    </div>
     @include('layouts.farmersmarket-advertisement-comments')
</div>

@endsection