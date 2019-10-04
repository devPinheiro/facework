<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobsCategory extends Model
{
    //
     //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'     
   ];

    // A category can have many jobs
    public function jobs(){
        return  $this->hasMany('App\Jobs');
      }
}
