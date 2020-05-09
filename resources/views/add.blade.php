@extends('layouts.app')

//this will add laravel’s default navbar to your page

@section('content')

<div class="container">
    <h2>Add New Lab</h2>
               
    <form method="POST" action="/lab">
        <div class="form-group">
            <textarea name="name" class="form-control"></textarea>  
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Task</button>
        </div>
    {{ csrf_field() }}
    </form>

</div>

@endsection