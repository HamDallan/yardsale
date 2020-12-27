<!--
    Author: Dan Hallam - B00750229
    Class: requests.create
    Description: view for creating a request
-->
@extends('layouts.app')

@section('content')
<div class="container">

    <form action="/r/" enctype="multipart/form-data" method="post">
          
    @csrf
          <div class="col-8 offset-2">
                        <div class="row">
                        <h1>Make a Request</h1>
                        </div>
                        <hr>
                        <div class="row">
                        <h5>Table Name: {{$post->caption}} </h1>
                        </div>
                        <div class="row">
                        <h5>Price: ${{$post->price}}</h1>
                        </div>

                        <div class="form-group row">
                            <label for="item" class="col-md-4 col-form-label">Item(s) Requested</label>

                                <input id="item"
                                    type="text"
                                    class="form-control @error('item') is-invalid @enderror"
                                    name="item"
                                    value=""
                                    autocomplete="item" autofocus>

                                @error('item')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('item')}}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label">Address</label>

                                <input id="address"
                                    type="text"
                                    class="form-control @error('address') is-invalid @enderror"
                                    name="address"
                                    value=""
                                    autocomplete="address" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title')}}</strong>
                                    </span>
                                @enderror
                        </div>
                        <input type="hidden" name="post_id" value="{{$post->id}}">

                        <div class="row pt-4">
                            <button class="btn btn-primary">Send Request</button>
                </div>
          <div>
    </form>

</div>
@endsection
