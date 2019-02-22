@extends('layouts.master')

@section('title',$new->title)


@section('content')
<div class="container"> 
<div>{{  $new->title  }}</div>  
<div>{{  $new->content  }}</div>
<hr/> 
@if($new->user)
<p>Created by {{ $new->user->name }}</p>
@endif

@if(count($new->teams))
<ul>
    @foreach($new->teams as $team)
    <li>
        <a href="{{route('teams-show',['id' => $team->id])}}">{{ $team->name }}</a>
    </li>
    @endforeach
</ul>
@endif 
</div>

 {{-- <div class="container">

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
</div> --}}

@endsection 
