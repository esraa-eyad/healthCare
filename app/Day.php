<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $guarded = ['created_at', 'updated_at'];

    protected $dates = [
        'published_at',
    ];


    public function schedule()
    {
        return $this->belongsTo('App\Schedule');
    }
}
