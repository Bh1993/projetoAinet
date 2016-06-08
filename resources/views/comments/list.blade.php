@extends('layouts.backend')

@section('title', 'List Comments')

@section('content')

@if (count($comments))
    <table class="table table-striped">
    <thead>
        <tr>
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
            <td><a href="">{{ $comment->user->name}}</a></td>
            <td>{{ $comment->advertisement->name }}</td>
            @if($comment->parent_id == NULL)
            <td>No</td>
            @else
            <td>{{ $comment->parent_id }}</td>
            @endif
            <td>{{ $comment->created_at }}</td>
            
            <td>
                    <div class="form-group">
                        <button type="submit" class="btn btn-xs btn-danger">Block Comment</button>
                    </div>    
            </td>
        </tr>
    @endforeach
    </table>
    @include('layouts.pagination-comments',['paginator'=>$comments])
@else
    <h2>No comments found</h2>
@endif
@endsection

