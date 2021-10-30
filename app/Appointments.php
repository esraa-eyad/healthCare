<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = ['id','user_id','hospital_id','schedules_id','vaccine_id','status','takeVaccine','typeVaccine'];


    public function hospitals(){

        return $this->belongsTo('App\Hospital','hospital_id');
    }
    public function users(){

        return $this->belongsTo('App\User','user_id');
    }
    public function appointments_schedules(){

        return $this->belongsTo('App\Schedule','schedules_id');
    }

    public function vaccine(){

        return $this->belongsTo('App\Vaccine','vaccine_id');
    }
}
