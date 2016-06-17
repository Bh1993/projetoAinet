@extends('layouts.backend')

@section('title', 'List Comments')

@section('content')

@if (count($comments))
    <div>
        <a class="btn btn-primary" href="{{url('comments')}}">All Comments</a>
        <a class="btn btn-primary" href="{{route('comments.allBlocked')}}">List of All Comments Blocked</a>
    </div>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>User</th>
            <th>Advertisement</th>
            <th>Reply</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    
    <tbody>
    @foreach ($comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td><a href="">{{ $comment->user->name}}</a></td>
            <td>{{ $comment->advertisement->name }}</td>
            @if($comment->parent_id == NULL)
            <td>No</td>
            @else
            <td>{{ $comment->parent_id }}</td>
            @endif
            <td>{{ $comment->created_at }}</td>
            
            <td>
                <form action="{{route('comments.block', ['id' => $comment->id])}}" method="post" class="inline">
                {{ csrf_field() }}
                <div class="form-group">
                     @if ($comment->blocked == 0)
                    <button type="submit" class="btn btn-xs btn-danger" name="block" >Block Comment</button>
                    @else
                    <button type="submit" class="btn btn-xs btn-success" name"block" >Unblock Comment</button>
                    @endif
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

