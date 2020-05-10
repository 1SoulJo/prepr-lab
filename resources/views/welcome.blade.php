@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        @if (Auth::check())
            <div class="card-header">
                <b>Labs List</b>
            </div>
            <div class="card-body">
                <!-- Buttons -->
                <a href="/lab" class="btn btn-primary btn-add-new">Add New Lab</a>
                <a href="/map" class="btn btn-outline-success">Labs Map</a>
                
                <!-- Search form -->
                <form action="/search" method="POST" role="search" class="search-form">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="Search labs">
                            <button type="submit" class="btn btn-info search-btn">
                                Search
                            </button>
                    </div>
                </form>

                <!-- List -->
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date created</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($labs as $lab)
                            <tr>
                                <td class="list-item-lab-name" onclick="openLab({{$lab->id}})">
                                    {{$lab->name}}
                                </td>
                                <td class="list-item-date-created">
                                    {{$lab->created_at}}
                                </td>
                                <td class="list-item-btns">
                                    <form class="list-item-form" action="/lab/{{$lab->id}}">
                                        <button type="submit" name="edit" formmethod="POST" class="btn btn-primary">Edit</button>
                                        <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="card-body">
                <h3>You need to log in. <a href="/login">Click here to login</a></h3>
            </div>
        @endif
    </div>                         
</div>

@endsection


@push('head')
<style>
    .table td {
        vertical-align: middle;
    }

    .list-item-lab-name {
        cursor: pointer;
        font-size: 1.3em;
    }

    .list-item-lab-name:hover {
        font-weight: bold;
        background: #eeeeee;
    }

    .list-item-btns {
        width: 1%;
        text-align: end;
    }

    .list-item-form {
        display: flex;
    }

    .list-item-form button:first-of-type {
        margin-right: 10px;
    }

    .list-item-date-created {
        width: 20%;
    }

    .search-form {
        margin: 10px 0;
        width: 50%;
    }

    .search-btn {
        border-radius: 0 5px 5px 0;
    }
</style>
@endpush