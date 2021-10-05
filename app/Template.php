<?php

namespace Club;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table='templates';
    protected $fillable=['user_id','division_id'];

    public function Users(){
    	return $this->belongsTo(User::class,'user_id');
    } 
    public function Divisions(){
    	return $this->belongsTo(Division::class,'division_id');
    }
}

