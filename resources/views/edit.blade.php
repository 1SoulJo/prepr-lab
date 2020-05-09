@extends('layouts.app')

@section('content')

<div class="container">
	<h1>Edit the Lab</h1>

    <form method="POST" action="/lab/{{ $lab->id }}">
        <div class="form-group">
            <textarea name="name" class="form-control">{{$lab->name }}</textarea>	
        </div>

        <div class="form-group">
            <button type="submit" name="update" class="btn btn-primary">Update lab</button>
        </div>
    {{ csrf_field() }}
    </form>
</div>

@endsection