<?php
/**
 * Author: Dan Hallam - B00750229
 * Class: Profile
 * Description: Model that holds the database relationships for Profile Objects
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{

    protected $guarded =[];

    public function profileImage(){

        //also stores the function for displaying profile images. If a profile image is set, that is displayed, otherwise a default image is used.
        $imagePath = ($this->image) ? $this->image : 'profile/defaultProfilePic.png';

        return '/storage/' . $imagePath;

    }

    //a profile belongs to one user, no more no less
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
?>
