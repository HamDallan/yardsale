<?php
/**
 * Author: Dan Hallam - B00750229
 * Class: Request
 * Description: Model that holds the database relationships for Request Objects
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $guarded = [];
    
    //A request belongs to one user, no more no less
    public function user(){
        return $this->belongsTo(User::class);

    }
}
