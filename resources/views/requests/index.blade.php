<!--
    Author: Dan Hallam - B00750229
    Class: requests.index
    Description: view for displaying a user's requests
-->
@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-6 offset-3" style="color:black;text-align:center">
<h1>Requests</h1>
<hr>
</div>
    <!-- cycle through all requests where the current user is the seller and the status is still pending -->
    <?php
        $request = App\Models\Request::where('seller', Auth::user()->email)->get()
            ->where('status',"pending");
    ?>
    @foreach($request as $requests)
    <div class="row">
            <div class="col-6">
            <h2 style="color:black;text-align:left">Request for: {{$requests->item}}</h2>
            </div>
            <?php 
                //get the image associated with the post in the request
                $post_id = $requests->post_id;
                $post_image = DB::table('posts')->where('id',$post_id)->value('image');
                
            ?>
            <a href="/p/{{$post_id}}">
                    <img alt="$post->caption" src="/storage/{{$post_image}}" style="width:50%">
            </a>
        </div>
    <hr>
        <div class="col-6">
        <a class="btn btn-neg" href="/requests/delete/{{$requests->id}}">Delete </a>
        <a class="btn btn-pos" href="/requests/approve/{{$requests->id}}">Approve </a>
        </div>
        <div class="row pt-2 pb-4">
        
            <div class="col-6">
                <p><span class="font-weight-bold">
                        <div>
                            <span class="text-dark">Sent By {{$requests->buyer}}</span>
                        </div>
                        <span class="text-dark">Address: {{$requests->address}}</span>
  
                </p>
            </div>
        </div>
        <hr>




    @endforeach
</div>
@endsection
