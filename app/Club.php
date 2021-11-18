<?php

namespace Club;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table='clubs';
    protected $fillable=[
    	'image','name','mision','history','stadium_id','network_id','rif','email','phone_number', 'address'
    ];
    public function Networks(){
    	return $this->belongsTo(Network::class,'network_id');
    }
    public function Stadia(){
    	return $this->belongsTo(Stadium::class,'stadium_id');
    }

    public function ClubHomes(){
    	return $this->hasMany(Encounter::class,'club_home_id');
    }
    public function ClubVisitors(){
    	return $this->hasMany(Encounter::class,'club_visitor_id');
    }
   /* public function Address(){
        return $this->hasMany(Address::class,'address_id');
    }*/

}
