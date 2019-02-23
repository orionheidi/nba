@extends('layouts.master')

@section('title', 'Create a news')

@section('content')

<div class="container">
   <form method="POST" action="{{ route('news-store') }}">
   {{-- <form method="POST" action="/blog/public/posts"> --}}
    @csrf
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Title</label>
        <div class="col-8">
            <input id="text" name="title" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }} " value= "{{ old('title') }}" >
            @include('partials.invalid-feedback',['field' => 'title'])
        </div>
    </div>
    <div class="form-group row">
        <label for="textarea" class="col-4 col-form-label">Content</label>
        <div class="col-8">
            <textarea id="textarea" name="content" cols="40" rows="5" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }} " >{{ old('content') }} </textarea>
            @include('partials.invalid-feedback',['field' => 'content'])
        </div>
    </div>
    @if(count($teams))
    <div class="form-group">
        <label for="teams[]">Teams</label>
        @foreach($teams as $team)
        <input type="checkbox" id="team" name="teams[]" value="{{$team->id}}">{{$team->name}}<br>
        @endforeach
    </div>
    @endif
    <div class="form-group row">
    <div class="offset-4 col-8">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    </form>
</div>
@endsection