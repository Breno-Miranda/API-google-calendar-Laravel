<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['title', 'description', 'date_start', 'date_finish'];

    protected $hidden = [''];

    protected $dates = ['date_start' , 'date_finish'];

    public function Schedules()
    {
        return $this->belongsTo('App\Schedule');
    }
}
