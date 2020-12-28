<!--
    Author: Dan Hallam - B00750229
    Class: post.index
    Description: View for displaying all posts in database for homepage
-->
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-6 offset-3" style="color:black;text-align:center">

    </div>
    <h2 style="color:black;text-align:center">Users</h2>
    <hr>

    @foreach ($users ?? '' as $user)
    <p>
        <div class="row">
            <div class="col-6 offset-3">

                <a style="color:darkblue" href="/profile/{{$user->id}}">
                    <h4>
                        <ul>{{$user->username}}</ul>
                    </h4>
                </a>
                <?php
                $user_id = $user->id;
                $user_posts = DB::table('posts')->where('user_id', $user_id)->get();
                ?>

                @foreach ($user_posts ?? '' as $user_post)
                <img alt="{{$user_post->caption}}" src="/storage/{{ $user_post->image }}" style=max-width:70px>
                @endforeach
            </div>
        </div>
    </p>
    @endforeach


    <p>
        <h2 style="color:black;text-align:center">Tables</h2>
        <hr>
        @foreach ($posts ?? '' as $post)
        <div class="row">
            <div class="col-6 offset-3">

                <h2 style="color:black;text-align:center">${{$post->price}} Table </h2>
                <a href="/p/{{$post->id }}">
                    <img alt="{{$post->caption}}" src="/storage/{{$post->image}}" class="w-100">
                </a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-6 offset-3">



                <p><span class="font-weight-bold">

                        <span class="text-dark"></span>
                        </a></span>
                </p>
            </div>
        </div>
        <hr>
        @endforeach
</div>
</p>
@endsection