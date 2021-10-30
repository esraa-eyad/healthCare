<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $fillable = ['id','answer','user_id','question_id'];
    public function questions(){

        return $this->belongsTo('App\Question','question_id');
    }
    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
