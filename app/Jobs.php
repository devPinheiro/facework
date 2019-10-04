<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    //
     //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title','position','description', 'experience', 'job_type', 'salary', 'date_posted', 'deadline_date' ,'location'     
   ];

    // A job belongs to a category uniquely
    public function category(){
        return  $this->belongsTo('App\JobsCategory');
      }
}
