@extends('layouts.app')

@section('content')

<div class="container">
	<h1>Edit the Lab</h1>

    <div class="card">
        <div class="card-body">
            <form method="POST" name="update" action="/lab/{{ $lab->id }}">
                <div class="form-group">
                    <h3>Lab name</h3>
                    <input type="text" name="lab_name" class="form-control" value="{{$lab->name}}"></input>  
                </div>

                <div class="form-group">
                    <h3>Descrpition</h3>
                    <textarea name="desc" class="form-control" value="{{$lab->desc}}"></textarea>  
                </div>

                <h3>Location</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputAddress">Address 1</label>
                            <input type="text" name="address1" class="form-control" id="inputAddress" value="{{$lab->address1}}">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" name="address2" class="form-control" id="inputAddress2" value="{{$lab->address2}}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" name="city" class="form-control" id="inputCity" value="{{$lab->city}}">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <input type="text" name="state" id="inputState" class="form-control" value="{{$lab->state}}">
                            </div>
                            <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" name="zip" class="form-control" id="inputZip" value="{{$lab->zip}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 20px;">
                    <button type="submit" name="update" class="btn btn-primary">Update lab</button>
                </div>
            {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection