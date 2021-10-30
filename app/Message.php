<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'sender_id', 'reciever_id', 'message','replay'
    ];

    public function hospitals(){

        return $this->belongsTo('App\Hospital','reciever_id');
    }
    public function users(){

        return $this->belongsTo('App\User','sender_id');
    }
}
