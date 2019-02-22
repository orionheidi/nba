@extends('layouts.master')

@section('title',$team->title)


@section('content')

<div class="container"> 
@if(count($team->news))
<ul>
    @foreach($team->news as $new)
    <li>
        <a href="{{route('news-show',['id' => $new->id])}}">{{ $new->title }}</a>
    </li>
{{-- {{$team->news->links()}}  --}}
@endforeach
</ul>
@endif

<div>{{  $team->name  }}</div>  
<div>{{  $team->address  }}</div>
<div>{{  $team->city  }}</div>
<div>{{  $team->email  }}</div>
        <hr/>   

    @foreach($team->players  as $player) 
    <div class="p-4 alert alert-success">
    <div class ="text-muted">  
        <a href="{{ route('players-show',['id' => $team->id]) }}">{{$player->first_name}}{{$player->last_name}}</a>
    </div>
        
    </div>
 @endforeach
  
 <hr/>   
 @foreach($team->comments as $comment) 
 <div class="p-4 alert alert-success">
 <div class ="text-muted">  
     {{$comment->created_at}}
 </div>
 @if($comment->user)
     <strong>{{$comment->user->name}} says: </strong>
 @endif
     {{ $comment->content}}
 </div>
@endforeach

 <div class="container">

    <form method="POST" action="{{ route('show-comments',['id' => $team->id]) }}">

@csrf
 <div class="form-group row">
     <label for="textarea" class="col-4 col-form-label">Comment</label>
 <div class="col-8">
     <textarea id="textarea" name="content" cols="20" rows="5" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }} " >{{ old('content') }} </textarea>
 @include('partials.invalid-feedback',['field' => 'content'])
 </div>
 </div>
@if($message = session('message'))
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
@endif
 <div class="form-group row">
 <div class="offset-4 col-8">
     <button type="submit" class="btn btn-primary">Submit</button>
 </div>
 </form>
</div>
</div>
{{-- {{$news->teams()->links()}}  --}}
@endsection 


