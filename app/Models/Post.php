<?php
/**
 * Author: Dan Hallam - B00750229
 * Class: Post
 * Description: Model that holds the database relationships for Post Objects
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = [];

    //A post belongs to one user, no more no less
    public function user(){
        return $this->belongsTo(User::class);

    }

    
}
