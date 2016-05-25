@extends('layouts.backend')

@section('title', 'List users')

@section('content')
<div>
    <a class="btn btn-primary" href="{{route('users.create')}}">Add user</a>
    <div class="pull-right"> 
       <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Order By
                <span class="caret">
            </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">Email</a></li>
            <li><a href="#">Fullname</a></li>
            <li><a href="#">Regist Date</a></li>
            <li><a href="#">Type</a></li>
        </ul>
        </div>
      
    </div>
</div>

@if (count($users))
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Email</th>
            <th>Name</th>
            <th>Admin</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
            <td><a href="{{route('users.display-user', ['id' => $user->id])}}">{{ $user->name }}</td>
            <td>{{ $user->getType() }}</td>
            <td>{{ $user->getStatus() }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            
            <td>
                <a class="btn btn-xs btn-primary" href="{{route('users.edit', ['id' => $user->id])}}">Edit</a>
                <form action="{{route('users.delete', ['id' => $user->id])}}" method="post" class="inline">
                    <div class="form-group">
                        <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                    </div>

                </form>
            </td>
        </tr>
    @endforeach
    </table>
    @include('layouts.pagination-users',['paginator'=>$users])
@else
    <h2>No users found</h2>
@endif
@endsection

