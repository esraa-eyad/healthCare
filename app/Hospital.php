<?php




namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



 class Hospital extends Authenticatable
{
    use Notifiable;

    protected $guard = 'hospital';

    protected $fillable = [
        'nameOfHospital', 'email', 'password','mobile'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

     public function vaccines(){

         return $this->hasMany('App\Vaccine', 'id');
     }

     public function posts()
     {
         return $this->hasMany('App\post');
     }

     public function schedules()
     {
         return $this->hasMany('App\Schedule');
     }
     public function appointments_hospital()
     {
         return $this->hasMany('App\Appointments');
     }
     public function Message()
     {
         return $this->hasMany('App\Message');
     }
}
