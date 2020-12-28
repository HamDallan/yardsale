<!--
    Author: Dan Hallam - B00750229
    Class: profiles.index
    Description: view for displaying user profiles
-->
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
        <div class="col-3 p-5">
               <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100" alt="profile pic">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4"> {{$user->username}} </div>

                </div>


                


            </div>
            

            <div class="d-flex">
                <div class="pr-3"><strong>{{$user->posts->count()}}</strong> table(s)</div>
                
            </div>
            
            <div>{{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->url}}</a></div>

            @can ('update', $user->profile)
                <a class="btn btn-primary" href="/profile/{{$user->id}}/edit"> Edit Profile </a>
            @endcan
   
            
        </div>
   </div>
   <div>
   <h1><u>Tables</u> </h1> @can ('update', $user->profile)
                    <a class="btn btn-pos" href='/p/create'>Add New Table</a>
                @endcan
</div>
   <div class="row pt-4">
       @foreach($user->posts as $post)
            <div class="col-4 pb-4">
            {{$post->price}} $
                <a href="/p/{{ $post->id }}">
                    
                    <img src= "/storage/{{ $post->image }}"class="w-100">
                </a>
            </div>

       @endforeach

   </div>
@endsection
