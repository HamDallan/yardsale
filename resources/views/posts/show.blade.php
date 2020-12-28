<!--
    Author: Dan Hallam - B00750229
    Class: posts.show 
    Description: view for expanding post to it's own page
-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" alt="" class="rounded-circle w-100" style="max-width: 40px">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{$post->user->id}}">
                                
                                <span class="text-dark"> {{$post->user->username}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <h4>Price: ${{$post->price}}</h1>
            <p><span class="font-weight-bold">

                <a href="/profile/{{$post->user->id}}">
                
                </a>
                <h4> Items: </h4>
                </span>  {{$post->caption}}
                <div>
                </p>
                <?php
                    //Check to make sure user isn't the owner of the post, or an admin
                    if (($post->user_id != Auth::user()->id) && (Auth::user()->user_type != 'Admin')){
                ?>
                <a class="btn btn-pos" href="/r/{{ $post->id}}">Request</a>
                    <?php 
                //if they are the owner of the post, or an admin, they are able to delete the post.
                } else{?>
                        <a class="btn btn-neg" href="/p/delete/{{$post->id}}">Delete </a>
                        
                    <?php } ?>

                
                </div>
            </p>
        </div>
    </div>
</div>
@endsection
