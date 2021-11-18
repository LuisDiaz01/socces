<?php

namespace Club;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    // 
    protected $table='networks';
    protected $fillable = ['facebook','twitter','instagram'];

    public function Users(){
    	return $this->hasMany(User::class);
    }
    public function Club(){
    	return $this->hasMany(Club::class);
    }
}
