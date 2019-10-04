<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public function user(){
       return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'client_name','description','title', 'phone', 'location', 'date', 'user_id',
    ];
}
