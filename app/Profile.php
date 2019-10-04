<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{   
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'user_id', 'about', 'service', 'address', 'state', 'phone', 'image', 'name', 'email'
    ];

    // A profile belongs to User uniquely
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    // Users with unique profile can have as many post as can be
    public function post(){
       return $this->hasMany('App\Post');
    }

    // Users with unique profile can comment as can be
    public function comment(){
       return $this->hasMany('App\Comments');
    }

}
