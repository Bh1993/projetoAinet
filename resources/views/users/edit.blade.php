@extends('layouts.backend')

@section('title', 'Edit user')

@section('content')
@if (count($errors) > 0)
    @include('partials.errors')
@endif
<form action="{{route('users.edit', ['id' => $user->id])}}" method="post" class="form-group">
    {{ csrf_field() }}
    @include('users.partials.add-edit')
<div class="form-group">
    <label for="inputStatus">Status</label>
    <select name="uadmin" id="inputStatus" class="form-control">
        <option disabled selected> -- select an option -- </option>
        @if($user->blocked )
        <option value="1" selected >Blocked</option>
        <option value="0">Unblocked</option>
        @else
        <option value="0" selected >Unblocked</option>
        <option value="1">Blocked</option>
        @endif
    </select>
</div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="save">Save</button>
        <a class="btn btn-default" href="{{url('users')}}">Cancel</a>
    </div>
</form>
@endsection
