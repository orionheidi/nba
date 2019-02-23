@extends('layouts.master')

@section('title')

@section('content')

<div class="p-4 alert alert-success">
    <div class ="text-muted">  
        <a>{{$player->first_name}}{{$player->last_name}}</a>
        <a href="{{ route('teams-show',['id' => $player->team->id]) }}">{{$player->team->name}}</a>
    </div>
</div>

@endsection