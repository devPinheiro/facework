<?php

namespace App;

use Laravel\Passport\HasApiTokens;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Love\Liker\Models\Liker as LikerContract;
use Cog\Laravel\Love\Liker\Models\Traits\Liker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable implements LikerContract
{
    use Notifiable;
    use HasRoles;
    use Liker;
    use HasApiTokens;
    use SoftDeletes;

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
   


    protected $dates = ['deleted_at'];


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'title', 'user_id', 'active', 'api_token', 'activation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','activation_token'
    ];

    // public function posts(){

    //     return $this->hasMany(Post::class);
    // }

    public function followers() 
    {
        return $this->belongsToMany(self::class, 'followers', 'follows_id', 'user_id')
                    ->withTimestamps();
    }

    public function follows() 
    {
        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follows_id')
                    ->withTimestamps();
    }

    public function follow($userId) 
    {
        $this->follows()->attach($userId);
        return $this;
    }

    public function unfollow($userId)
    {
        $this->follows()->detach($userId);
        return $this;
    }

    public function isFollowing($userId) 
    {
        return (boolean) $this->follows()->where('follows_id', $userId)->first(['id']);
    }
}
