<?php

/**
 * Author: Dan Hallam - B00750229
 * Class: PostsController
 * Description: controller to handle logic for Displaying posts, Creating Posts, and uploading posts to the database
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Post;
use DB;
use Auth;

class PostsController extends Controller
{

    //constructor function creates middleware that verifies the user of the application is authenticated
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Function: index()
     * Description: Stores all posts in the database, and compacts them with the returned view to be accessed.
     */
    public function index()
    {
        $posts = Post::all();
        if (Auth::user()->user_type == 'Admin') {
            return view('posts.index', compact('posts'));
        } else {
            $city = Auth::user()->city;
            $posts = $posts->where('city', $city);
            $posts = $posts->sortByDesc('created_at');

            return view('posts.index', compact('posts'));
        }
    }
    /**
     * Function: create()
     * Description: returns the create post view
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Function: store()
     * Description: validates inputed data from the create post view, and stores it into the database,
     */
    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'price' => 'required',
            'image' => ['required', 'image','mimes:jpeg,png,jpg,gif,svg', 'max:500000'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        $city = Auth::user()->city;

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
            'price' => $data['price'],
            'city' => $city,
        ]);

        //user is redirected to their profile
        return redirect('/profile/' . auth()->user()->id);
    }

    public function delete(\App\Models\Post $post)
    {
        $id = $post->id;
        DB::table('posts')->where('id', $id)->delete();
        return redirect('/profile/' . auth()->user()->id);
    }
    /**
     * Function: show()
     * Description: takes a specific post and compacts it with a returned view
     */
    public function show(\App\Models\Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function search(Request $request)
    {

        $word = $request['search'];

        $posts = DB::table('posts')->where('caption', 'LIKE', '%' . $word . '%')->get();
        $posts = $posts->sortByDesc('created_at');

        $users = DB::table('users')->where('name', 'LIKE', '%' . $word . '%')->orWhere('username', 'LIKE', '%' . $word . '%')->get();

        return view('posts.search', ['posts' => $posts, 'users' => $users]);
    }
}
