
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>{{$lab->name}} Detail</h1>
    <p>{{$lab->created_at}}</p>
    <p>{{$lab->desc}}</p>
    <p>{{$lab->address1}} {{$lab->city}} {{$lab->state}} {{$lab->zip}}</p>
    <a href="{{$lab->getMapUrl()}}" class="btn btn-outline-success" target="_blank">Open in Google Map</a>
</div>

@endsection
