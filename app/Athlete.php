<?php

namespace Club;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    protected $table='athletes';
    protected $fillable = ['name','lastname','email','dni','date_n','network_id','goles','attendances'];
}
