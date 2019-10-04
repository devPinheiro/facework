<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // Mass Assignment
    protected $fillable = [
        'messages',
        'user_id'
    ];

    // Relationships
    public function user(){
        return $this->belongsTo('App\User');
    }
}
