<?php

namespace App;

use auth;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //

     protected $fillable = [
        'post_id','user_id'     
   ];


   // return relationship for likes
   public function post(){
       return $this->belongsTo('App\Post');
   }

   //return relationship for user
   public function user(){
       return $this->belongsTo('App\User');
   }

 
}
