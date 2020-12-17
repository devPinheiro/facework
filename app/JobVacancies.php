<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobVacancies extends Model
{
    //
    //
     //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title','description', 'job_type', 'deadline_date' 
   ];

    // A job belongs to a category uniquely
    public function category(){
        return  $this->belongsTo('App\JobsCategory');
      }
}
