<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $fillable = [
        'name', 'numOfVaccine', 'available','hospital_id'
    ];
    public function hospitals(){

        return $this->belongsTo('App\Hospital','hospital_id');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointments');
    }
}
