<?php

namespace Club;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	protected $table='directions';
	protected $fillable = ['id','address'];
	public function Clubs(){
		return $this->belongsTo(Club::class);
	}
}
