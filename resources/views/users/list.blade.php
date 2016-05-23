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
            <th>location</th>
            <th>profile_photo</th>
            <th>profile_url</th>
            <th>presentation</th>
            <th>admin</th>
            <th>blocked</th>
            <th>sells_evals</th>
            <th>sells_count</th>
            <th>buys_evals</th>
            <th>buys_count</th>
            <th>Actions</th>
        </tr>
    </thead>
    
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->location }}</td>
            <td>{{ $user->profile_photo }}</td>
            <td>{{ $user->profile_url }}</td>
            <td>{{ $user->presentation }}</td>
            <td>{{ $user->admin }}</td>
            <td>{{ $user->blocked }}</td>
            <td>{{ $user->sells_evals }}</td>
            <td>{{ $user->sells_count }}</td>
            <td>{{ $user->buys_evals }}</td>
            <td>{{ $user->buys_count }}</td>
            
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
    @include('layouts.pagination-users')
@else
    <h2>No users found</h2>
@endif
@endsection

