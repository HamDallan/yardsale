<!--
    Author: Dan Hallam - B00750229
    Class: post.index
    Description: View for displaying all posts in database for homepage
-->
@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-6 offset-3" style="color:black;text-align:center">
<h1><b>New Tables</b></h1>
<hr>
</div>
    @foreach ($posts ?? '' as $post)
    <div class="row">
            <div class="col-6 offset-3">
            
            <h2 style="color:black;text-align:center">${{$post->price}} Table </h2>
                <a href="/p/{{$post->id }}">
                    <img src="/storage/{{$post->image}}" class="w-100" alt="{{$post->caption}}">
                </a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-6 offset-3">



                <p><span class="font-weight-bold">
                    <a href="/profile/{{$post->user->id}}">
                        <span class="text-dark">{{$post->user->username}}</span>
                    </a></span>  
                </p>
            </div>
        </div>
        <hr>
    @endforeach
</div>
@endsection
