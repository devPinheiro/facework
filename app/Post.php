<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cog\Contracts\Love\Likeable\Models\Likeable as LikeableContract;
use Cog\Laravel\Love\Likeable\Models\Traits\Likeable;

use Auth;

class Post extends Model implements LikeableContract
{
    use Likeable;
    //
    
    protected $fillable = [
        'profile_id','title', 'body','featured'     
   ];

    // A post belongs to a User uniquely
    public function profile(){
      return  $this->belongsTo('App\Profile');
    }
    
    // post can have as many likes as can be
    public function likes(){
        return $this->hasMany('App\Like');
    }

    // post can have as many comments as can be
    public function comments(){
        return $this->hasMany('App\Comments');
    }
    
    // Like method implementation
    public function is_liked_by_auth_user(){
       $id = Auth::id();
       $likers = array();

       foreach($this->likes as $like):
           # code...
           array_push($likers, $like->user_id);
       endforeach;

       if(in_array($id, $likers)){
           return true;
       } else {
           return false;
       }
   }
}
