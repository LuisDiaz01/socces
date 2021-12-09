<?php

namespace Club;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table='templates';
    protected $fillable=['athlete_id','division_id'];

    public function Athlete(){
    	return $this->belongsTo(Athlete::class,'athlete_id');
    } 
    public function Divisions(){
    	return $this->belongsTo(Division::class,'division_id');
    }
}

