<!--
    Author: Dan Hallam - B00750229
    Class: posts.create
    Description: View for creating a post
-->

@extends('layouts.app')

@section('content')
<div class="container">

     <form action="/p" enctype="multipart/form-data" method="post">

        @csrf

        <div class="row">

                <div class="col-8 offset-2">
                    <div class="row">
                    <h1>Add New Post </h1>
                    </div>
                    
                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label">Items: (list all)</label>
                
                            <textarea id="caption"
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="caption"
                                value="{{ old('caption') }}"
                                autocomplete="caption" autofocus>
                                </textarea>
                            @error('caption')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('caption')}}</strong>
                                </span>
                            @enderror
                            
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label">Price (Whole Numbers Only)</label>

                            <input id="price"
                                type="number"
                                class="form-control @error('name') is-invalid @enderror"
                                name="price"
                                value="{{ old('price') }}"
                                autocomplete="price" autofocus>
        

                            @error('caption')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('price')}}</strong>
                                </span>
                            @enderror
                    </div>
                

                    <div class="row">

                        <label for="image" class="col-md-4 col-form-label">Post Image</label>

                        <input type="file", class="form-control-file" id="image" name="image">
                        @error('image')

                                <strong>{{ $errors->first('image')}}</strong>

                        @enderror
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Add New Post</button>

                </div>
        </div>
     </form>

</div>
@endsection
