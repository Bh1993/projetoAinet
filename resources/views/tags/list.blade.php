@extends('layouts.backend')

@section('title', 'List Tags')

@section('content')

@if (count($tags))
    <div>
        <a class="btn btn-primary" href="{{url('tags')}}">All Comments</a>
        <a class="btn btn-primary" href="{{route('tags.allBlocked')}}">List of All Tags Blocked</a>
    </div>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
        </tr>
    </thead>
    
    <tbody>
    @foreach ($tags as $tag)
        <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->user->name}}</a></td>
            <td>{{ $comment->advertisement->name }}</td>
           
            
            <td>
                <form action="{{route('tags.block', ['id' => $tag->id])}}" method="post" class="inline">
                {{ csrf_field() }}
                <div class="form-group">
                     @if ($tag->blocked == 0)
                    <button type="submit" class="btn btn-xs btn-danger" name="block" >Block Tag</button>
                    @else
                    <button type="submit" class="btn btn-xs btn-success" name"block" >Unblock Tag</button>
                    @endif
                </div>
      
            </form>   
            </td>
        </tr>
    @endforeach
    </table>
    @include('layouts.pagination-tag',['paginator'=>$tags])
@else
    <h2>No tags found</h2>
@endif
@endsection

