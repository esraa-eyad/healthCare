<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    protected $fillable = [ 'expire','time', 'date','hospital_id','day','NumOfAvailable'];
   // protected $dates = ['date'];


    public function hospitals_schedule(){

        return $this->belongsTo('App\Hospital','hospital_id');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointments');
    }


}
