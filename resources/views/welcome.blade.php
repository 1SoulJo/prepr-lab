@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        @if (Auth::check())
            <div class="card-header">Labs List</div>
            <div class="card-body">
                <a href="/new" class="btn btn-primary btn-add-new">Add New Lab</a>
                <a href="/new" class="btn btn-outline-success">Labs Map</a>
                <table class="table mt-4">
                    <thead><tr>
                        <th colspan="2">Labs</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($labs as $lab)
                    <tr>
                        <td class="list-item-lab-name" onclick="openLab({{$lab->id}})">
                            {{$lab->name}}
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