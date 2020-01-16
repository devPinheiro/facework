<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Love\Liker\Models\Liker as LikerContract;
use Cog\Laravel\Love\Liker\Models\Traits\Liker;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable implements LikerContract
{
    use Notifiable;
    use HasRoles;
    use Liker;

    public function setPasswordAttribute($password)
        {   
            $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
        }
    // user can only have one profile (relationship)   
    public function profile(){
        return $this->hasOne('App\Profile');
    }
    
    // user can have as many task as possible
    public function task(){
        return $this->hasMany('App\Task');
    }

    /**
     * 
     *  Other relationships can be define here
     */
    // user can have as many message as possible
    public function message(){
        return $this->hasMany('App\Message');
    }
   
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'title', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function posts(){

    //     return $this->hasMany(Post::class);
    // }
}
