
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="lab-header">
            <h1>{{$lab->name}}</h1>
            <p class="date">Date created : {{$lab->created_at}}</p>
        </div>
        
        <nav>
            <a href="#" class="menu"><span>Menu 1</span></a>
            <a href="#" class="menu"><span>Menu 2</span></a>
            <a href="#" class="menu"><span>Menu 3</span></a>
        </nav>
    </div>

    <!-- Location -->
    <div class="card">
        <div class="card-header">
            Location
        </div>
        <div class="card-body">
            {{$lab->address1}} {{$lab->city}} {{$lab->state}} {{$lab->zip}}<br>
            <a href="{{$lab->getMapUrl()}}" class="btn btn-outline-success" target="_blank">Open in Google Map</a>
        </div>
    </div>

    <!-- Description -->
    <div class="card">
        <div class="card-header">
            Description
        </div>
        <div class="card-body">
            <p>{{$lab->desc}}</p>
        </div>
    </div>
</div>

@endsection


@push('head')
<style>
    a:hover {
        text-decoration: none;
    }

    nav {
        display: flex;
        min-height: 50px;
        align-items: center;
    }

    .date {
        font-weight: bold;
        color: gray;
        text-align: right;
    }

    .card {
        margin-bottom: 10px;
    }

    .lab-header {
        background: navy;
        color: white;
        padding: 20px 10px 10px 10px;
        border-radius: 5px 5px 0 0;
    }

    .menu {
        margin: 0 6px;
        padding: 0 4px;
        font-size: 100%;
        color: black;
    }

    .card-header {
        font-weight: bold;
    }
</style>
@endpush