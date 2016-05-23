@extends('layouts.backend')

@section('title', 'Edit user')

@section('content')
@if (count($errors) > 0)
    @include('partials.errors')
@endif
<form action="users-edit.php" method="post" class="form-group">
    <input type="hidden" name="user_id" value="" />
    @include('users.partials.add-edit')
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="ok">Save</button>
        <button type="submit" class="btn btn-default" name="cancel">Cancel</button>
    </div>
</form>
@endsection
