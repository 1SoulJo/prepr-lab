@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Add New Lab</h2>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="/new">
                <div class="form-group">
                    <h3>Lab name</h3>
                    <input type="text" name="lab_name" class="form-control" value="{{old('lab_name')}}"></input>  
                </div>

                <div class="form-group">
                    <h3>Descrpition</h3>
                    <textarea name="desc" class="form-control" value="{{old('desc')}}"></textarea>  
                </div>

                <h3>Location</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputAddress">Address 1</label>
                            <input type="text" name="address1" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{old('address1')}}">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" name="address2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" value="{{old('address2')}}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" name="city" class="form-control" id="inputCity" value="{{old('city')}}">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <input type="text" name="state" id="inputState" class="form-control" value="{{old('state')}}">
                            </div>
                            <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" name="zip" class="form-control" id="inputZip" value="{{old('zip')}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Add Lab</button>
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