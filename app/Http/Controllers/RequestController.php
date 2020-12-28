<?php

/**
 * Author: Dan Hallam - B00750229
 * Class: RequestController
 * Description: controller to handle logic for Displaying requests, Creating requests, and uploading requests to the database
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;


class RequestController extends Controller
{
    /**
     * Function: index()
     * Description: Queries database for all requests where the user is the seller, and compacts them with the requests index view
     * Accepts: nothing
     * Returns: the user's request page with their request's compacted
     */
    public function index()
    {
        $email = Auth::user()->email;
        $requests = DB::table('requests')->where('seller', $email);
        return view('requests.index', compact('requests'));
    }
    /**
     * Function: __construct()
     * Description: constructor function that makes sure the user is authorized
     * Accepts: nothing
     * Returns: nothing
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Function:create()
     * Description: directs user to the create post view
     * Accepts: Post object
     * Returns: The create request page for the post
     */
    public function create(\App\Models\Post $post)
    {
        return view('requests.create', compact('post'));
    }
    /**
     * Function:delete()
     * Description: deletes a request from the database
     * Accepts: a request object
     * Returns: deletes request object and redirects the user to their profile 
     */
    public function delete(\App\Models\Request $request)
    {
        $id = $request->id;
        DB::table('requests')->where('id', $id)->delete();
        return redirect('/profile/' . auth()->user()->id);
    }

    /**
     * Function:approve()
     * Description: sets the request "status" field to approved
     * Accepts: a request object
     * Returns: sets the request object's "Status" field to approved and redirects to the user's profile
     */
    public function approve(\App\Models\Request $request)
    {
        $id = $request->id;
        $request = DB::table('requests')->where('id', $id);
        $request->update(['status' => 'approved']);

        return redirect('/profile/' . auth()->user()->id);
    }


    /**
     * Function: store()
     * Description: Takes the form data from the create post view, validates it then stores it in the database
     * Accepts: a post object
     * Returns: Stores post data in database and redirects to user's profile
     */
    public function store(\App\Models\Post $post)
    {
        $data = request()->validate([
            'item' => 'required',
            'address' => 'required',
            'post_id' => 'required',

        ]);
        //specific data not found from the form is queried from the database
        //***This code is very messy, change in future iteration */
        $request = new \App\Models\Request();
        $request->item = $data['item'];
        $request->address = $data['address'];
        $request->buyer = Auth::user()->email;
        $postID = $data['post_id'];

        $sellerID = DB::table('posts')->where('id', $postID)->value('user_id');
        $price = DB::table('posts')->where('id', $postID)->value('price');
        $request->price = $price;
        $request->post_id = $postID;
        $request->seller = DB::table('users')->where('id', $sellerID)->value('email');
        $request->status = "pending";

        $request->save();


        return redirect('/profile/' . auth()->user()->id);
    }
}
