@extends('layouts.backend')

@section('title', 'List Comments')

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

@if (count($comments))
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Comment number</th>
            <th>User</th>
            <th>Advertisement</th>
            <th>Reply</th>
            <th>Created At</th>
        </tr>
    </thead>
    
    <tbody>
    @foreach ($comments as $comment)
        <tr>
            <td><a href="{{route('comments.display-comment', ['id' => $comment->id])}}">{{ $comment->id }}</td>
            <td>{{ $comment->user_id }}</td>
            <td>{{ $comment->advertisement_id }}</td>
            <td>{{ $comment->parent_id }}</td>
            <td>{{ $comment->created_at }}</td>
            
            <td>
                <a class="btn btn-xs btn-primary" href="{{route('users.edit', ['id' => $user->id])}}">Edit</a>
                <form action="{{route('comments.delete', ['id' => $comment->id])}}" method="post" class="inline">
                {{ csrf_field() }}
                    <div class="form-group">
                        <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                    </div>

                </form>
            </td>
        </tr>
    @endforeach
    </table>
    @include('layouts.pagination-comments',['paginator'=>$comments])
@else
    <h2>No comments found</h2>
@endif
@endsection

