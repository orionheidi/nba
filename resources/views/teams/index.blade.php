@extends('layouts.master')

@section('title')
All teams
@endsection 

@section('content')

<div class="container">   
  <main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-3 mb-4 font-italic border-bottom">Teams</h3>
      @foreach($teams as $team)
    <div class="blog-post">
      <h2 class="blog-post-title"><a href="{{ route('teams-show',['id' => $team->id]) }}"> {{ $team->name }}</a></h2>
      <p class="blog-post-meta"> {{ $team->created_at }}</p>
      <p>{{ $team->address }}</p>
      <p>{{ $team->city }}</p>
      <p>{{  $team->email  }}</p>
    </div><!-- /.blog-post -->
      @endforeach
  </div><!-- /.row -->
  </main><!-- /.container -->
    {{$teams->links()}}  
@endsection 
