<?php
/**
 * Author: Dan Hallam - B00750229 + Generated with Laravel's Authentication, using make:auth
 * Class: User
 * Description: Model that holds the database relationships for User Objects
 */
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Stevebauman\Location\Facades\Location;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'city',
        'user_type',
        'address_address',
        'address_latitude',
        'address_longitude',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){
        parent::boot();

        static::created(function ($user){
            $user->profile()->create([
                'title'=>$user->username,
            ]);
        });
    }
    //a user can have many posts
    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at','DESC');
    }


    //a user has one profile
    public function profile(){
        return $this->hasOne(Profile::class);
    }

    //a user can have many requests
    public function requests(){
        return $this->hasMany(Request::class)->orderBy('created_at','DESC');
    }

   
}




















