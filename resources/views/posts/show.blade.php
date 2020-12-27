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
  
                </a></span>  {{$post->caption}}
                <div>
                <?php
                    if ($post->user_id != Auth::user()->id){
                ?>
                <a class="button" href="/r/{{ $post->id}}">Request</a>
                    <?php } else{?>
                        <a class="button" href="/p/delete/{{$post->id}}">Delete </a>
                    
                        
                    <?php } ?>

                
                </div>
            </p>
        </div>
    </div>
</div>
@endsection
