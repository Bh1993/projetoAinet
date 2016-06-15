@extends('layouts.backend')

@section('title', 'List users')

@section('content')

<div>
    <a class="btn btn-primary" href="{{route('users.create')}}">Add user</a>
    <a class="btn btn-primary" href="{{url('users')}}">All Users</a>
    <a class="btn btn-primary" href="{{route('users.allBlocked')}}">List of All User Blocked</a>
  
    <div class="pull-right"> 
       {!!Form::open(['route' => 'users-orderBy'])!!}
       {!!Form::select('options', $options)!!}
       {!!Form::submit('Order!')!!}
       {!!Form::close()!!}
    </div>
</div>

@if (count($users))
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td><a href="{{route('users.display-user', ['id' => $user->id])}}">{{ $user->name }}</a></td>
            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
            <td>{{ $user->getType() }}</td>
            <td>{{ $user->getStatus() }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            
            <td>
                <a class="btn btn-xs btn-primary" href="{{route('users.edit', ['id' => $user->id])}}">Edit</a>
                <form action="{{route('users.delete', ['id' => $user->id])}}" method="post" class="inline">
                {{ csrf_field() }}
                    <div class="form-group">
                        <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                    </div>

                </form>
                <form action="{{route('users.block', ['id' => $user->id])}}" method="post" class="inline">
                    {{ csrf_field() }}
                    <div class="form-group">
                        @if ($user->blocked == 0)
                        <button type="submit" class="btn btn-xs btn-danger" name="block" >Block User</button>
                        @else
                        <button type="submit" class="btn btn-xs btn-success" name"block" >Unblock User</button>
                        @endif
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

