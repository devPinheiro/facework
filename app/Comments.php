<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id','profile_id','body'     
   ];

    // A comment belongs to a post uniquely
    public function post(){
        return  $this->belongsTo('App\Post');
      }

      // A comment belongs to a profile uniquely
    public function profile(){
        return  $this->belongsTo('App\Profile');
      }
}
