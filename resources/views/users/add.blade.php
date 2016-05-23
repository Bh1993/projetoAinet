@extends('layouts.backend')

@section('title', 'Create user')

@section('content')
@if (count($errors) > 0)
    @include('partials.errors')
@endif

<form action="{{url('users/create')}}" method="post" class="form-group">
    {{ csrf_field() }}
    @include('users.partials.add-edit')
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input
            type="password" class="form-control"
            name="password" id="inputPassword"
            value=""/>
    </div>
    <div class="form-group">
        <label for="inputPasswordConfirmation">Password confirmation</label>
        <input
            type="password" class="form-control"
            name="password_confirmation" id="inputPasswordConfirmation"/>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="ok">Add</button>
        <a class="btn btn-default" href="{{url('users')}}">Cancel</a>
    </div>
</form>
@endsection
