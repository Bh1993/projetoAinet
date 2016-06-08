@extends('layouts.backend')

@section('title', 'Advertisement Information')

@section('content')
@if (count($errors) > 0)
    @include('partials.errors')
@endif

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
    <p> {{ $advertisement->price_cents }} </p>
</div>

<div class="form-group">
    <label for="inputQunatity">Quantity</label>
    <p> {{ $advertisement->quantity }} </p>
</div>

<div class="form-group">
    <label for="inputMediaContent">Media Content</label>
    <p>{{ $advertisement->media }}</p>
</div>

<div class="form-group">
    <label for="inputTags">Tags</label>
    <p> {{ $advertisement->tags }} </p>
</div>

<div class="form-group">
    <label for="inputTags">Status</label>
    <p> {{ $advertisement->getStatus() }}</p>
</div>

    <div class="form-group">
    
        <button type="submit" class="btn btn-success" href="{{route('advertisements.edit', ['id' => $advertisement->id])}}">Edit</button>
        <button type="submit" class="btn btn-default" name="cancel" href="{{url('advertisements')}}">Cancel</button>
    </div>

    @endsection