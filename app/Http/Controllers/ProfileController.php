<?php
/**
 * Author: Dan Hallam - B00750229
 * Class: ProfileController
 * Description: controller to handle logic for Creating a profile, Editing a profil, and uploading profile data to the database
 */


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    /**
     * Function: index()
     * Description: Takes a specific user and compacts it with a profile view to return the correct profile
     */
    public function index(\App\Models\User $user)
    {
        return view('profiles.index', compact('user'));
    }

    /**
     * Function: edit()
     * Description: First user is authorized (don't want other users editing your profile), then they are redirected to the edit profile view with their own user object compacted with it.
     */
    public function edit(\App\Models\User $user)
    {

        $this->authorize('update',$user->profile);
        return view('profiles.edit', compact('user'));
    }
    /**
     * Function: update()
     * Description: Makes sure user is authorized again, then updates the database to match the newly entered values
     */
    public function update(\App\Models\User $user)
    {

        $this->authorize('update',$user->profile);
        //data validation (nothing is required as we are simply editing already set data)
        $data= request()->validate([
            'title' => '',
            'description' => '',
            'url' => '',
            'image' => '',
        ]);


        //if statement to handle if image is updated
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }


        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
