@extends('layouts.backend')

@section('title', 'Edit Advertisement')

@section('content')
@if (count($errors) > 0)
    @include('partials.errors')
@endif

<form action="{{url('advertisements.edit')}}" method="post" class="form-group">
    
<div class="form-group">
    <label for="inputDescription">Description</label>
    <input
        type="text" class="form-control"
        name="description" id="inputDescription"
        placeholder="Description"
        value=" {{ $advertisement->description }}" />
</div>
<div class="form-group">
    <label for="inputStartDate">Start Date</label>
    <input
        type="date" class="form-control"
        name="available_on" id="inputDate"
        placeholder="Start Date"
        value="{{ $advertisement->available_on }}"/>
</div>

<div class="form-group">
    <label for="inputEndDate">End Date</label>
    <input
        type="date" class="form-control"
        name="available_until" id="inputEndDate"
        placeholder="End Date"
        value="{{ $advertisement->available_until }}"/>
</div>

<div class="form-group">
    <label for="inputPrice">Price</label>
    <input
        type="price" class="form-control"
        name="price_cents" id="inputPrice"
        placeholder="Price"
        value="{{ $advertisement->price_cents }}"/>
</div>

<div class="form-group">
    <label for="inputQunatity">Quantity</label>
    <input
        type="quantity" class="form-control"
        name="quantity" id="inputQuantity"
        placeholder="Quantity"
        value="{{ $advertisement->quantity }}"/>
</div>

<div class="form-group">
    <label for="inputMediaContent">Media Content</label>
    <input
        type="mediaContent" class="form-control"
        name="mediaContent" id="inputMediaContent"
        placeholder="Media Content"
        value="{{ $advertisement->media }}"/>
</div>

<div class="form-group">
    <label for="inputTags">Tags</label>
    <input
        type="tags" class="form-control"
        name="tags" id="inputTags"
        placeholder="Tags"
        value="{{ $advertisement->tags }}"/>
</div>

<div class="form-group">
    <label for="inputTags">Status</label>
    <input
        type="text" class="form-control"
        name="blocked" id="inputStatus"
        value="{{ $advertisement->getStatus() }}"/>
</div>
    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Save</button>
        <button type="submit" class="btn btn-default" name="cancel" href="{{url('advertisements')}}">Cancel</button>
    </div>
</form>
@endsection