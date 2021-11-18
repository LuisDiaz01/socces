<?php

namespace Club;

use Illuminate\Database\Eloquent\Model;

class Encounter extends Model
{
    protected $table='encounters';
    protected $fillable=['club_home_id','club_visitor_id','start','end','title'];

    public function ClubHome(){
    	return $this->belongsTo(Club::class,'club_home_id');
    }
    public function ClubVisitor(){
    	return $this->belongsTo(Club::class,'club_visitor_id');
    }
}
